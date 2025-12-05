<?php

namespace App\Filament\Portal\Resources;

use App\Filament\Portal\Resources\ApplicationResource\Pages;
use App\Models\Application;
use App\Models\Job;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

class ApplicationResource extends Resource
{
    protected static ?string $model = Application::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Applications';

    protected static ?string $navigationGroup = 'Job Management';

    protected static ?string $recordTitleAttribute = 'user.name';

    public static function canCreate(): bool
    {
        return auth()->user()->hasAnyRole(['super_admin', 'hr_manager']);
    }

    public static function canEdit($record): bool
    {
        return auth()->user()->hasAnyRole(['super_admin', 'hr_manager', 'shortlister', 'reviewer']);
    }

    public static function canDelete($record): bool
    {
        return auth()->user()->hasRole('super_admin');
    }

    public static function canDeleteAny(): bool
    {
        return auth()->user()->hasRole('super_admin');
    }

    public static function canView($record): bool
    {
        return auth()->user()->hasAnyRole(['super_admin', 'hr_manager', 'shortlister', 'reviewer']);
    }

    public static function canViewAny(): bool
    {
        return auth()->user()->hasAnyRole(['super_admin', 'hr_manager', 'shortlister', 'reviewer']);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Application Details')
                    ->description('Review or create a job application')
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->label('Applicant')
                            ->relationship('user', 'name')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->getOptionLabelFromRecordUsing(fn ($record) => "{$record->name} ({$record->email})")
                            ->columnSpan(2),

                        Forms\Components\Select::make('job_id')
                            ->label('Job Position')
                            ->relationship('job', 'title')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->getOptionLabelFromRecordUsing(fn ($record) => "{$record->title} - {$record->company_name}")
                            ->columnSpan(2),
                    ])->columns(2),

                Forms\Components\Section::make('CV/Resume')
                    ->schema([
                        Forms\Components\FileUpload::make('cv_path')
                            ->label('Upload CV/Resume')
                            ->directory('cvs')
                            ->acceptedFileTypes([
                                'application/pdf',
                                'application/msword',
                                'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
                            ])
                            ->maxSize(5120) // 5MB
                            ->required()
                            ->downloadable()
                            ->openable()
                            ->previewable(false)
                            ->helperText('Accepted formats: PDF, DOC, DOCX (Max: 5MB)')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Application Status')
                    ->description('Manage the application progress')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->options([
                                'pending' => 'Pending Review',
                                'reviewing' => 'Under Review',
                                'shortlisted' => 'Shortlisted',
                                'interview' => 'Interview Scheduled',
                                'accepted' => 'Accepted',
                                'rejected' => 'Rejected',
                            ])
                            ->default('pending')
                            ->required()
                            ->native(false)
                            ->helperText('Update the current status of this application')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Applicant Name')
                    ->searchable()
                    ->sortable()
                    ->weight('medium')
                    ->description(fn (Application $record): string => $record->user->email),

                Tables\Columns\TextColumn::make('user.phone')
                    ->label('Phone')
                    ->icon('heroicon-o-phone')
                    ->searchable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('job.title')
                    ->label('Job Position')
                    ->searchable()
                    ->sortable()
                    ->weight('medium')
                    ->wrap()
                    ->limit(30)
                    ->description(fn (Application $record): string => $record->job->company_name),

                Tables\Columns\BadgeColumn::make('job.job_type')
                    ->label('Type')
                    ->colors([
                        'success' => 'Full Time',
                        'warning' => 'Part Time',
                        'info' => 'Remote',
                        'gray' => 'Internship',
                        'primary' => 'Contract',
                    ])
                    ->toggleable(),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'secondary' => 'pending',
                        'warning' => 'reviewing',
                        'info' => 'shortlisted',
                        'primary' => 'interview',
                        'success' => 'accepted',
                        'danger' => 'rejected',
                    ])
                    ->icons([
                        'heroicon-o-clock' => 'pending',
                        'heroicon-o-eye' => 'reviewing',
                        'heroicon-o-star' => 'shortlisted',
                        'heroicon-o-calendar' => 'interview',
                        'heroicon-o-check-circle' => 'accepted',
                        'heroicon-o-x-circle' => 'rejected',
                    ])
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Applied On')
                    ->date('M d, Y')
                    ->sortable()
                    ->description(fn (Application $record): string => $record->created_at->diffForHumans()),

                Tables\Columns\TextColumn::make('cv_path')
                    ->label('CV')
                    ->formatStateUsing(fn () => 'Download')
                    ->icon('heroicon-o-document-arrow-down')
                    ->color('primary')
                    ->url(fn (Application $record): string => Storage::url($record->cv_path))
                    ->openUrlInNewTab()
                    ->toggleable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending Review',
                        'reviewing' => 'Under Review',
                        'shortlisted' => 'Shortlisted',
                        'interview' => 'Interview Scheduled',
                        'accepted' => 'Accepted',
                        'rejected' => 'Rejected',
                    ])
                    ->multiple()
                    ->label('Application Status'),

                Tables\Filters\SelectFilter::make('job_id')
                    ->label('Job Position')
                    ->relationship('job', 'title')
                    ->searchable()
                    ->preload()
                    ->multiple(),

                Tables\Filters\SelectFilter::make('job.job_type')
                    ->label('Job Type')
                    ->options([
                        'Full Time' => 'Full Time',
                        'Part Time' => 'Part Time',
                        'Remote' => 'Remote',
                        'Internship' => 'Internship',
                        'Contract' => 'Contract',
                    ])
                    ->multiple(),

                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('applied_from')
                            ->label('Applied From'),
                        Forms\Components\DatePicker::make('applied_until')
                            ->label('Applied Until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['applied_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['applied_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\Action::make('shortlist')
                    ->icon('heroicon-o-star')
                    ->color('info')
                    ->requiresConfirmation()
                    ->action(function (Application $record) {
                        try {
                            $oldStatus = $record->status;
                            $record->update(['status' => 'shortlisted']);

                            // Send email notification
                            $record->user->notify(new \App\Notifications\ApplicationStatusChanged($record, $oldStatus));

                            // Filament toast notification
                            Notification::make()
                                ->success()
                                ->title('Applicant Shortlisted')
                                ->body($record->user->name . ' has been shortlisted and notified via email.')
                                ->send();

                        } catch (\Exception $e) {
                            Notification::make()
                                ->danger()
                                ->title('Error')
                                ->body('Failed to shortlist application: ' . $e->getMessage())
                                ->send();

                            \Log::error('Shortlist error: ' . $e->getMessage());
                        }
                    })
                    ->visible(fn (Application $record): bool =>
                        in_array($record->status, ['pending', 'reviewing']) &&
                        auth()->user()->hasAnyRole(['shortlister', 'hr_manager', 'super_admin'])
                    ),
                Tables\Actions\Action::make('schedule_interview')
                    ->icon('heroicon-o-calendar')
                    ->color('primary')
                    ->form([
                        Forms\Components\Section::make('Interview Details')
                            ->description('Schedule interview and provide instructions to the candidate')
                            ->schema([
                                Forms\Components\Select::make('interview_type')
                                    ->label('Interview Type')
                                    ->options([
                                        'internal' => 'Internal Interview (Favorite HR Services)',
                                        'external' => 'External Interview (Client Interview)',
                                    ])
                                    ->required()
                                    ->native(false)
                                    ->helperText('Choose whether this is an internal HR interview or client interview')
                                    ->columnSpanFull(),

                                Forms\Components\Textarea::make('interview_instructions')
                                    ->label('Interview Instructions')
                                    ->placeholder('Provide interview details, date/time, location, what to bring, meeting link, etc.')
                                    ->rows(6)
                                    ->required()
                                    ->helperText('These instructions will be sent to the candidate via email')
                                    ->columnSpanFull(),

                                Forms\Components\DateTimePicker::make('interview_date')
                                    ->label('Interview Date & Time')
                                    ->required()
                                    ->native(false)
                                    ->displayFormat('F d, Y \a\t h:i A')
                                    ->minDate(now())
                                    ->helperText('Select the interview date and time')
                                    ->columnSpanFull(),
                            ])
                    ])
                    ->action(function (Application $record, array $data) {
                        try {
                            $oldStatus = $record->status;
                            $record->update([
                                'status' => 'interview',
                                'interview_type' => $data['interview_type'],
                                'interview_instructions' => $data['interview_instructions'],
                                'interview_date' => $data['interview_date'],
                            ]);

                            // Send email notification with interview details
                            $record->user->notify(new \App\Notifications\ApplicationStatusChanged($record, $data));

                            // Filament toast
                            $interviewTypeLabel = $data['interview_type'] === 'internal' ? 'Internal Interview' : 'Client Interview';
                            Notification::make()
                                ->success()
                                ->title('Interview Scheduled')
                                ->body($record->user->name . ' has been notified about the ' . $interviewTypeLabel)
                                ->send();

                        } catch (\Exception $e) {
                            Notification::make()
                                ->danger()
                                ->title('Error')
                                ->body('Failed to schedule interview: ' . $e->getMessage())
                                ->send();

                            \Log::error('Interview scheduling error: ' . $e->getMessage());
                        }
                    })
                    ->visible(fn (Application $record): bool =>
                        $record->status === 'shortlisted' &&
                        auth()->user()->hasAnyRole(['reviewer', 'hr_manager', 'super_admin'])
                    ),



                Tables\Actions\Action::make('accept')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->modalHeading('Accept Application')
                    ->modalDescription('Are you sure you want to accept this application? The candidate will be notified.')
                    ->action(function (Application $record) {
                        try {
                            $oldStatus = $record->status;
                            $record->update(['status' => 'accepted']);

                            // Send email notification
                            $record->user->notify(new \App\Notifications\ApplicationStatusChanged($record, $oldStatus));

                            // Filament toast
                            Notification::make()
                                ->success()
                                ->title('Application Accepted')
                                ->body('Congratulations! ' . $record->user->name . ' has been accepted and notified.')
                                ->send();

                        } catch (\Exception $e) {
                            Notification::make()
                                ->danger()
                                ->title('Error')
                                ->body('Failed to accept application: ' . $e->getMessage())
                                ->send();
                        }
                    })
                    ->visible(fn (Application $record): bool =>
                        in_array($record->status, ['shortlisted', 'interview']) &&
                        auth()->user()->hasAnyRole(['hr_manager', 'super_admin'])
                    ),

                Tables\Actions\Action::make('reject')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->modalHeading('Reject Application')
                    ->modalDescription('Are you sure you want to reject this application? The candidate will be notified.')
                    ->action(function (Application $record) {
                        try {
                            $oldStatus = $record->status;
                            $record->update(['status' => 'rejected']);

                            // Send email notification
                            $record->user->notify(new \App\Notifications\ApplicationStatusChanged($record, $oldStatus));

                            // Filament toast
                            Notification::make()
                                ->warning()
                                ->title('Application Rejected')
                                ->body($record->user->name . ' has been notified of the rejection.')
                                ->send();

                        } catch (\Exception $e) {
                            Notification::make()
                                ->danger()
                                ->title('Error')
                                ->body('Failed to reject application: ' . $e->getMessage())
                                ->send();
                        }
                    })
                    ->visible(fn (Application $record): bool =>
                        !in_array($record->status, ['accepted', 'rejected']) &&
                        auth()->user()->hasAnyRole(['reviewer', 'hr_manager', 'super_admin'])
                    ),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\BulkAction::make('mark_as_reviewing')
                        ->icon('heroicon-o-eye')
                        ->color('warning')
                        ->requiresConfirmation()
                        ->action(function ($records) {
                            foreach ($records as $record) {
                                $oldStatus = $record->status;
                                $record->update(['status' => 'reviewing']);
                                $record->user->notify(new \App\Notifications\ApplicationStatusChanged($record, $oldStatus));
                            }
                        })
                        ->deselectRecordsAfterCompletion()
                        ->visible(fn () => auth()->user()->hasAnyRole(['reviewer', 'hr_manager', 'super_admin'])),

                    Tables\Actions\BulkAction::make('shortlist')
                        ->icon('heroicon-o-star')
                        ->color('info')
                        ->requiresConfirmation()
                        ->action(function ($records) {
                            foreach ($records as $record) {
                                $oldStatus = $record->status;
                                $record->update(['status' => 'shortlisted']);
                                $record->user->notify(new \App\Notifications\ApplicationStatusChanged($record, $oldStatus));
                            }
                        })
                        ->deselectRecordsAfterCompletion()
                        ->visible(fn () => auth()->user()->hasAnyRole(['shortlister', 'hr_manager', 'super_admin'])),

                    Tables\Actions\BulkAction::make('accept')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->requiresConfirmation()
                        ->action(function ($records) {
                            foreach ($records as $record) {
                                $oldStatus = $record->status;
                                $record->update(['status' => 'accepted']);
                                $record->user->notify(new \App\Notifications\ApplicationStatusChanged($record, $oldStatus));
                            }
                        })
                        ->deselectRecordsAfterCompletion()
                        ->visible(fn () => auth()->user()->hasAnyRole(['hr_manager', 'super_admin'])),

                    Tables\Actions\BulkAction::make('reject')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->action(function ($records) {
                            foreach ($records as $record) {
                                $oldStatus = $record->status;
                                $record->update(['status' => 'rejected']);
                                $record->user->notify(new \App\Notifications\ApplicationStatusChanged($record, $oldStatus));
                            }
                        })
                        ->deselectRecordsAfterCompletion()
                        ->visible(fn () => auth()->user()->hasAnyRole(['reviewer', 'hr_manager', 'super_admin'])),

                    Tables\Actions\DeleteBulkAction::make()
                        ->visible(fn () => auth()->user()->hasRole('super_admin')),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->poll('30s')
            ->striped()
            ->emptyStateHeading('No applications yet')
            ->emptyStateDescription('Applications will appear here once candidates start applying.')
            ->emptyStateIcon('heroicon-o-document-text');
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Applicant Information')
                    ->schema([
                        Infolists\Components\Split::make([
                            Infolists\Components\Group::make([
                                Infolists\Components\TextEntry::make('user.name')
                                    ->label('Full Name')
                                    ->size(Infolists\Components\TextEntry\TextEntrySize::Large)
                                    ->weight('bold')
                                    ->color('primary')
                                    ->icon('heroicon-o-user'),

                                Infolists\Components\TextEntry::make('user.email')
                                    ->label('Email Address')
                                    ->icon('heroicon-o-envelope')
                                    ->copyable()
                                    ->copyMessage('Email copied!')
                                    ->copyMessageDuration(1500),

                                Infolists\Components\TextEntry::make('user.phone')
                                    ->label('Phone Number')
                                    ->icon('heroicon-o-phone')
                                    ->placeholder('Not provided')
                                    ->copyable(),

                                Infolists\Components\TextEntry::make('user.bio')
                                    ->label('Bio')
                                    ->placeholder('No bio provided')
                                    ->columnSpanFull(),
                            ]),

                            Infolists\Components\Group::make([
                                Infolists\Components\TextEntry::make('status')
                                    ->badge()
                                    ->size(Infolists\Components\TextEntry\TextEntrySize::Large)
                                    ->color(fn (string $state): string => match ($state) {
                                        'pending' => 'secondary',
                                        'reviewing' => 'warning',
                                        'shortlisted' => 'info',
                                        'interview' => 'primary',
                                        'accepted' => 'success',
                                        'rejected' => 'danger',
                                    }),

                                Infolists\Components\TextEntry::make('created_at')
                                    ->label('Applied On')
                                    ->dateTime('F d, Y')
                                    ->icon('heroicon-o-calendar'),

                                Infolists\Components\TextEntry::make('created_at')
                                    ->label('Time Ago')
                                    ->since()
                                    ->icon('heroicon-o-clock'),
                            ])->grow(false),
                        ])->from('md'),
                    ]),

                Infolists\Components\Section::make('Job Details')
                    ->schema([
                        Infolists\Components\TextEntry::make('job.title')
                            ->label('Job Position')
                            ->size(Infolists\Components\TextEntry\TextEntrySize::Large)
                            ->weight('bold')
                            ->icon('heroicon-o-briefcase'),

                        Infolists\Components\TextEntry::make('job.company_name')
                            ->label('Company')
                            ->icon('heroicon-o-building-office-2'),

                        Infolists\Components\TextEntry::make('job.job_type')
                            ->label('Employment Type')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'Full Time' => 'success',
                                'Part Time' => 'warning',
                                'Remote' => 'info',
                                'Internship' => 'gray',
                                'Contract' => 'primary',
                            }),

                        Infolists\Components\TextEntry::make('job.category')
                            ->label('Category')
                            ->badge(),

                        Infolists\Components\TextEntry::make('job.location')
                            ->label('Location')
                            ->icon('heroicon-o-map-pin'),

                        Infolists\Components\TextEntry::make('job.experience_level')
                            ->label('Experience Level')
                            ->badge()
                            ->color('gray'),
                    ])
                    ->columns(3),

                Infolists\Components\Section::make('Curriculum Vitae (CV)')
                    ->schema([
                        Infolists\Components\TextEntry::make('cv_path')
                            ->label('CV File')
                            ->formatStateUsing(fn (string $state): string => basename($state))
                            ->icon('heroicon-o-document')
                            ->color('primary')
                            ->url(fn (Application $record): string => Storage::url($record->cv_path))
                            ->openUrlInNewTab()
                            ->suffixAction(
                                Infolists\Components\Actions\Action::make('download')
                                    ->icon('heroicon-o-arrow-down-tray')
                                    ->url(fn (Application $record): string => Storage::url($record->cv_path))
                                    ->openUrlInNewTab()
                            ),
                    ]),

                Infolists\Components\Section::make('Application Timeline')
                    ->schema([
                        Infolists\Components\TextEntry::make('created_at')
                            ->label('Submitted')
                            ->dateTime('F d, Y \a\t h:i A')
                            ->icon('heroicon-o-paper-airplane'),

                        Infolists\Components\TextEntry::make('updated_at')
                            ->label('Last Updated')
                            ->dateTime('F d, Y \a\t h:i A')
                            ->icon('heroicon-o-arrow-path'),
                    ])
                    ->columns(2)
                    ->collapsed(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListApplications::route('/'),
            'create' => Pages\CreateApplication::route('/create'),
            'view' => Pages\ViewApplication::route('/{record}'),
            'edit' => Pages\EditApplication::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'pending')->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }
}

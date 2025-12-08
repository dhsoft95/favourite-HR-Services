<?php

namespace App\Filament\Portal\Resources;

use App\Filament\Portal\Resources\JobResource\Pages;
use App\Models\Job;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists;


class JobResource extends Resource
{
    protected static ?string $model = Job::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationLabel = 'Job Postings';

    protected static ?string $navigationGroup = 'Job Management';

    public static function canCreate(): bool
    {
        return auth()->user()->hasAnyRole(['super_admin', 'hr_manager']);
    }

    public static function canEdit($record): bool
    {
        return auth()->user()->hasAnyRole(['super_admin', 'hr_manager']);
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
                Forms\Components\Section::make('Basic Information')
                    ->description('Enter the core details about this job position')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Job Title')
                            ->placeholder('e.g., Senior Laravel Developer')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(2),

                        Forms\Components\TextInput::make('company_name')
                            ->label('Company Name')
                            ->placeholder('e.g., Tech Solutions Ltd')
//                            ->required()
                            ->maxLength(255)
                            ->columnSpan(2),

                        Forms\Components\FileUpload::make('image')
                            ->label('Image')
                            ->image()
                            ->directory('job-images')
                            ->disk('public')
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '1:1',
                                '16:9',
                            ])
                            ->maxSize(2048)
                            ->helperText('Upload company logo or job-related image (max 2MB)')
                            ->columnSpan(4),

                        Forms\Components\Select::make('job_type')
                            ->label('Employment Type')
                            ->options([
                                'Full Time' => 'Full Time',
                                'Part Time' => 'Part Time',
                                'Remote' => 'Remote',
                                'Internship' => 'Internship',
                                'Contract' => 'Contract',
                            ])
                            ->native(false)
                            ->required()
                            ->columnSpan(1),

                        Forms\Components\Select::make('category')
                            ->label('Job Category')
                            ->options([
                                'IT & Software' => 'IT & Software',
                                'Finance' => 'Finance',
                                'Healthcare' => 'Healthcare',
                                'Education' => 'Education',
                                'Marketing' => 'Marketing',
                                'Sales' => 'Sales',
                                'Engineering' => 'Engineering',
                                'Customer Service' => 'Customer Service',
                                'Human Resources' => 'Human Resources',
                                'Administration' => 'Administration',
                                'Operations' => 'Operations',
                                'Legal' => 'Legal',
                            ])
                            ->native(false)
                            ->searchable()
                            ->required()
                            ->columnSpan(1),

                        Forms\Components\TextInput::make('location')
                            ->label('Location')
                            ->placeholder('e.g., Dar es Salaam, Tanzania')
                            ->required()
                            ->maxLength(255)
                            ->prefixIcon('heroicon-o-map-pin')
                            ->columnSpan(1),

                        Forms\Components\Select::make('experience_level')
                            ->label('Experience Level')
                            ->options([
                                'Entry Level' => 'Entry Level (0-2 years)',
                                'Mid Level' => 'Mid Level (2-5 years)',
                                'Senior Level' => 'Senior Level (5+ years)',
                                'Executive' => 'Executive',
                            ])
                            ->native(false)
                            ->required()
                            ->columnSpan(1),

                        Forms\Components\DatePicker::make('deadline')
                            ->label('Application Deadline')
                            ->required()
                            ->native(false)
                            ->displayFormat('d/m/Y')
                            ->minDate(now())
                            ->prefixIcon('heroicon-o-calendar')
                            ->helperText('Last date for applications')
                            ->columnSpan(2),
                    ])->columns(4),

                Forms\Components\Section::make('Job Description')
                    ->description('Provide detailed information about the role')
                    ->schema([
                        Forms\Components\RichEditor::make('description')
                            ->label('Job Description')
                            ->required()
                            ->toolbarButtons([
                                'bold',
                                'bulletList',
                                'orderedList',
                                'h2',
                                'h3',
                                'italic',
                                'link',
                                'undo',
                                'redo',
                            ])
                            ->placeholder('Describe the role, responsibilities, and what the candidate will be doing...')
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('requirements')
                            ->label('Requirements & Qualifications')
                            ->required()
                            ->rows(6)
                            ->placeholder('List the required skills, education, experience, etc. (one per line)')
                            ->helperText('Use bullet points or separate each requirement on a new line')
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('benefits')
                            ->label('Benefits & Perks')
                            ->rows(6)
                            ->placeholder('Health insurance, paid leave, flexible hours, remote work, etc.')
                            ->helperText('Optional: List the benefits offered with this position')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Publication Settings')
                    ->description('Control how and when this job appears to candidates')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->label('Publication Status')
                            ->options([
                                'draft' => 'Draft',
                                'published' => 'Published',
                                'closed' => 'Closed',
                            ])
                            ->default('draft')
                            ->required()
                            ->native(false)
                            ->helperText('Draft: Not visible to users | Published: Live and accepting applications | Closed: No longer accepting applications')
                            ->columnSpan(2),

                        Forms\Components\Toggle::make('is_featured')
                            ->label('Featured Listing')
                            ->helperText('Show this job prominently at the top of listings')
                            ->inline(false)
                            ->columnSpan(1),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->helperText('Inactive jobs won\'t appear even if published')
                            ->inline(false)
                            ->columnSpan(1),
                    ])->columns(4),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->disk('public')
                    ->size(40)
                    ->circular()
                    ->defaultImageUrl('/images/default-company.png'),

                Tables\Columns\TextColumn::make('title')
                    ->label('Job Title')
                    ->searchable()
                    ->sortable()
                    ->weight('medium')
                    ->wrap()
                    ->limit(10),

                Tables\Columns\TextColumn::make('company_name')
                    ->label('Company')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'secondary' => 'draft',
                        'success' => 'published',
                        'danger' => 'closed',
                    ])
                    ->icons([
                        'heroicon-o-pencil' => 'draft',
                        'heroicon-o-check-circle' => 'published',
                        'heroicon-o-lock-closed' => 'closed',
                    ])
                    ->sortable(),

                Tables\Columns\BadgeColumn::make('job_type')
                    ->label('Type')
                    ->colors([
                        'success' => 'Full Time',
                        'warning' => 'Part Time',
                        'info' => 'Remote',
                        'gray' => 'Internship',
                        'primary' => 'Contract',
                    ])
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('category')
                    ->label('Category')
                    ->searchable()
                    ->sortable()
                    ->toggleable()
                    ->wrap(),

                Tables\Columns\TextColumn::make('location')
                    ->label('Location')
                    ->icon('heroicon-o-map-pin')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('experience_level')
                    ->label('Experience')
                    ->badge()
                    ->color('gray')
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('applications_count')
                    ->counts('applications')
                    ->label('Applications')
                    ->badge()
                    ->color(fn ($state): string => $state > 0 ? 'success' : 'gray')
                    ->sortable(),

                Tables\Columns\TextColumn::make('deadline')
                    ->label('Deadline')
                    ->date('M d, Y')
                    ->sortable()
                    ->color(fn ($state) => $state < now() ? 'danger' : null)
                    ->icon(fn ($state) => $state < now() ? 'heroicon-o-exclamation-triangle' : 'heroicon-o-calendar')
                    ->tooltip(fn ($state) => $state < now() ? 'Deadline passed' : null),

                Tables\Columns\IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean()
                    ->trueIcon('heroicon-o-star')
                    ->falseIcon('heroicon-o-star')
                    ->trueColor('warning')
                    ->falseColor('gray')
                    ->toggleable(),

                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Active')
                    ->onColor('success')
                    ->offColor('danger')
                    ->toggleable()
                    ->disabled(fn () => !auth()->user()->hasAnyRole(['super_admin', 'hr_manager'])),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Posted')
                    ->dateTime('M d, Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                        'closed' => 'Closed',
                    ])
                    ->multiple()
                    ->label('Status'),

                Tables\Filters\SelectFilter::make('job_type')
                    ->label('Employment Type')
                    ->options([
                        'Full Time' => 'Full Time',
                        'Part Time' => 'Part Time',
                        'Remote' => 'Remote',
                        'Internship' => 'Internship',
                        'Contract' => 'Contract',
                    ])
                    ->multiple(),

                Tables\Filters\SelectFilter::make('category')
                    ->label('Category')
                    ->multiple(),

                Tables\Filters\SelectFilter::make('experience_level')
                    ->label('Experience Level')
                    ->options([
                        'Entry Level' => 'Entry Level',
                        'Mid Level' => 'Mid Level',
                        'Senior Level' => 'Senior Level',
                        'Executive' => 'Executive',
                    ])
                    ->multiple(),

                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Featured Jobs')
                    ->placeholder('All jobs')
                    ->trueLabel('Featured only')
                    ->falseLabel('Not featured'),

                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Status')
                    ->placeholder('All jobs')
                    ->trueLabel('Active only')
                    ->falseLabel('Inactive only'),

                Tables\Filters\Filter::make('deadline')
                    ->form([
                        Forms\Components\DatePicker::make('deadline_from')
                            ->label('Deadline From'),
                        Forms\Components\DatePicker::make('deadline_until')
                            ->label('Deadline Until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['deadline_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('deadline', '>=', $date),
                            )
                            ->when(
                                $data['deadline_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('deadline', '<=', $date),
                            );
                    }),

                Tables\Filters\TernaryFilter::make('expired')
                    ->label('Deadline Status')
                    ->placeholder('All jobs')
                    ->trueLabel('Expired')
                    ->falseLabel('Active')
                    ->queries(
                        true: fn (Builder $query) => $query->whereDate('deadline', '<', now()),
                        false: fn (Builder $query) => $query->whereDate('deadline', '>=', now()),
                    ),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make()
                        ->visible(fn () => auth()->user()->hasAnyRole(['super_admin', 'hr_manager'])),

                    Tables\Actions\Action::make('publish')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->requiresConfirmation()
                        ->modalHeading('Publish Job')
                        ->modalDescription('Are you sure you want to publish this job? It will be visible to all users.')
                        ->action(fn (Job $record) => $record->update(['status' => 'published']))
                        ->visible(fn (Job $record): bool => $record->status === 'draft' && auth()->user()->hasAnyRole(['super_admin', 'hr_manager'])),

                    Tables\Actions\Action::make('unpublish')
                        ->icon('heroicon-o-arrow-uturn-left')
                        ->color('warning')
                        ->requiresConfirmation()
                        ->modalHeading('Move to Draft')
                        ->modalDescription('This job will no longer be visible to users.')
                        ->action(fn (Job $record) => $record->update(['status' => 'draft']))
                        ->visible(fn (Job $record): bool => $record->status === 'published' && auth()->user()->hasAnyRole(['super_admin', 'hr_manager'])),

                    Tables\Actions\Action::make('close')
                        ->icon('heroicon-o-lock-closed')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->modalHeading('Close Job Posting')
                        ->modalDescription('This job will be marked as closed and no longer accept applications.')
                        ->action(fn (Job $record) => $record->update(['status' => 'closed']))
                        ->visible(fn (Job $record): bool => $record->status !== 'closed' && auth()->user()->hasAnyRole(['super_admin', 'hr_manager'])),

                    Tables\Actions\Action::make('reopen')
                        ->icon('heroicon-o-lock-open')
                        ->color('info')
                        ->requiresConfirmation()
                        ->modalHeading('Reopen Job Posting')
                        ->modalDescription('This job will be moved to draft status.')
                        ->action(fn (Job $record) => $record->update(['status' => 'draft']))
                        ->visible(fn (Job $record): bool => $record->status === 'closed' && auth()->user()->hasAnyRole(['super_admin', 'hr_manager'])),

                    Tables\Actions\DeleteAction::make()
                        ->visible(fn () => auth()->user()->hasRole('super_admin')),
                ])->icon('heroicon-o-ellipsis-horizontal')
                    ->tooltip('Actions'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\BulkAction::make('publish')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->requiresConfirmation()
                        ->action(fn ($records) => $records->each->update(['status' => 'published']))
                        ->deselectRecordsAfterCompletion()
                        ->visible(fn () => auth()->user()->hasAnyRole(['super_admin', 'hr_manager'])),

                    Tables\Actions\BulkAction::make('unpublish')
                        ->icon('heroicon-o-arrow-uturn-left')
                        ->color('warning')
                        ->requiresConfirmation()
                        ->action(fn ($records) => $records->each->update(['status' => 'draft']))
                        ->deselectRecordsAfterCompletion()
                        ->visible(fn () => auth()->user()->hasAnyRole(['super_admin', 'hr_manager'])),

                    Tables\Actions\BulkAction::make('close')
                        ->icon('heroicon-o-lock-closed')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->action(fn ($records) => $records->each->update(['status' => 'closed']))
                        ->deselectRecordsAfterCompletion()
                        ->visible(fn () => auth()->user()->hasAnyRole(['super_admin', 'hr_manager'])),

                    Tables\Actions\BulkAction::make('feature')
                        ->icon('heroicon-o-star')
                        ->color('warning')
                        ->requiresConfirmation()
                        ->action(fn ($records) => $records->each->update(['is_featured' => true]))
                        ->deselectRecordsAfterCompletion()
                        ->visible(fn () => auth()->user()->hasAnyRole(['super_admin', 'hr_manager'])),

                    Tables\Actions\BulkAction::make('unfeature')
                        ->icon('heroicon-o-star')
                        ->color('gray')
                        ->requiresConfirmation()
                        ->action(fn ($records) => $records->each->update(['is_featured' => false]))
                        ->deselectRecordsAfterCompletion()
                        ->visible(fn () => auth()->user()->hasAnyRole(['super_admin', 'hr_manager'])),

                    Tables\Actions\DeleteBulkAction::make()
                        ->visible(fn () => auth()->user()->hasRole('super_admin')),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->poll('30s')
            ->striped()
            ->emptyStateHeading('No job postings yet')
            ->emptyStateDescription('Create your first job posting to get started.')
            ->emptyStateIcon('heroicon-o-briefcase')
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->label('Create Job Posting')
                    ->icon('heroicon-o-plus')
                    ->visible(fn () => auth()->user()->hasAnyRole(['super_admin', 'hr_manager'])),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Job Overview')
                    ->schema([
                        Infolists\Components\Split::make([
                            Infolists\Components\Group::make([
                                Infolists\Components\ImageEntry::make('image')
                                    ->label('Company Image')
                                    ->disk('public')
                                    ->size(100)
                                    ->circular()
                                    ->defaultImageUrl('/images/default-company.png'),

                                Infolists\Components\TextEntry::make('title')
                                    ->label('Job Title')
                                    ->size(Infolists\Components\TextEntry\TextEntrySize::Large)
                                    ->weight('bold')
                                    ->color('primary'),

                                Infolists\Components\TextEntry::make('company_name')
                                    ->label('Company')
                                    ->icon('heroicon-o-building-office-2')
                                    ->size(Infolists\Components\TextEntry\TextEntrySize::Medium),
                            ]),

                            Infolists\Components\Group::make([
                                Infolists\Components\TextEntry::make('status')
                                    ->badge()
                                    ->color(fn (string $state): string => match ($state) {
                                        'draft' => 'gray',
                                        'published' => 'success',
                                        'closed' => 'danger',
                                    }),

                                Infolists\Components\IconEntry::make('is_featured')
                                    ->label('Featured')
                                    ->boolean()
                                    ->trueIcon('heroicon-o-star')
                                    ->falseIcon('heroicon-o-star')
                                    ->trueColor('warning')
                                    ->falseColor('gray'),

                                Infolists\Components\IconEntry::make('is_active')
                                    ->label('Active')
                                    ->boolean(),
                            ])->grow(false),
                        ])->from('md'),
                    ])
                    ->columns(1),

                Infolists\Components\Section::make('Job Details')
                    ->schema([
                        Infolists\Components\TextEntry::make('job_type')
                            ->label('Employment Type')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'Full Time' => 'success',
                                'Part Time' => 'warning',
                                'Remote' => 'info',
                                'Internship' => 'gray',
                                'Contract' => 'primary',
                            }),

                        Infolists\Components\TextEntry::make('category')
                            ->label('Category')
                            ->badge()
                            ->color('primary'),

                        Infolists\Components\TextEntry::make('location')
                            ->label('Location')
                            ->icon('heroicon-o-map-pin')
                            ->color('gray'),

                        Infolists\Components\TextEntry::make('experience_level')
                            ->label('Experience Level')
                            ->badge()
                            ->color('gray'),

                        Infolists\Components\TextEntry::make('deadline')
                            ->label('Application Deadline')
                            ->date('l, F d, Y')
                            ->icon('heroicon-o-calendar')
                            ->color(fn ($state) => $state < now() ? 'danger' : 'success')
                            ->badge(),

                        Infolists\Components\TextEntry::make('applications_count')
                            ->label('Total Applications')
                            ->state(fn ($record) => $record->applications()->count())
                            ->badge()
                            ->color('info')
                            ->icon('heroicon-o-document-text'),
                    ])
                    ->columns(3),

                Infolists\Components\Section::make('Job Description')
                    ->schema([
                        Infolists\Components\TextEntry::make('description')
                            ->label('')
                            ->html()
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),

                Infolists\Components\Section::make('Requirements & Qualifications')
                    ->schema([
                        Infolists\Components\TextEntry::make('requirements')
                            ->label('')
                            ->prose()
                            ->markdown()
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),

                Infolists\Components\Section::make('Benefits & Perks')
                    ->schema([
                        Infolists\Components\TextEntry::make('benefits')
                            ->label('')
                            ->prose()
                            ->markdown()
                            ->placeholder('No benefits specified')
                            ->columnSpanFull(),
                    ])
                    ->collapsible()
                    ->collapsed(),

                Infolists\Components\Section::make('Metadata')
                    ->schema([
                        Infolists\Components\TextEntry::make('created_at')
                            ->label('Posted On')
                            ->dateTime('F d, Y \a\t h:i A')
                            ->icon('heroicon-o-clock'),

                        Infolists\Components\TextEntry::make('updated_at')
                            ->label('Last Updated')
                            ->dateTime('F d, Y \a\t h:i A')
                            ->icon('heroicon-o-arrow-path'),

                        Infolists\Components\TextEntry::make('created_at')
                            ->label('Time Since Posted')
                            ->since()
                            ->icon('heroicon-o-calendar-days'),
                    ])
                    ->columns(3)
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
            'index' => Pages\ListJobs::route('/'),
            'create' => Pages\CreateJob::route('/create'),
            'view' => Pages\ViewJob::route('/{record}'),
            'edit' => Pages\EditJob::route('/{record}/edit'),
        ];
    }
}

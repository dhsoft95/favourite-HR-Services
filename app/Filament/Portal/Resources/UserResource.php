<?php

namespace App\Filament\Portal\Resources;

use App\Filament\Portal\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Users';

    protected static ?string $navigationGroup = 'System';

    protected static ?int $navigationSort = 1;

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
                Forms\Components\Section::make('Personal Information')
                    ->description('Basic user information and contact details')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Full Name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('e.g., John Doe')
                            ->columnSpan(2),

                        Forms\Components\TextInput::make('email')
                            ->label('Email Address')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->placeholder('user@example.com')
                            ->prefixIcon('heroicon-o-envelope')
                            ->columnSpan(2),

                        Forms\Components\TextInput::make('phone')
                            ->label('Phone Number')
                            ->tel()
                            ->placeholder('+255 712 345 678')
                            ->prefixIcon('heroicon-o-phone')
                            ->maxLength(20)
                            ->columnSpan(2),

                        Forms\Components\Textarea::make('bio')
                            ->label('Biography')
                            ->rows(4)
                            ->placeholder('Tell us about yourself...')
                            ->helperText('Brief professional summary or personal introduction')
                            ->columnSpanFull(),
                    ])->columns(4),

                Forms\Components\Section::make('Account Settings')
                    ->description('Login credentials and account type')
                    ->schema([
                        Forms\Components\Select::make('role')
                            ->label('User Type')
                            ->options([
                                'user' => 'Job Seeker',
                                'admin' => 'Administrator',
                            ])
                            ->default('user')
                            ->required()
                            ->native(false)
                            ->helperText('Basic user type for system access')
                            ->columnSpan(2),

                        Forms\Components\Select::make('spatie_roles')
                            ->label('System Role')
                            ->relationship('roles', 'name')
                            ->options(function () {
                                if (auth()->user()->hasRole('super_admin')) {
                                    return Role::whereIn('name', ['super_admin', 'hr_manager', 'shortlister', 'reviewer'])
                                        ->pluck('name', 'id');
                                }
                                return [];
                            })
                            ->multiple()
                            ->native(false)
                            ->preload()
                            ->searchable()
                            ->helperText('Assign system permissions and roles')
                            ->visible(fn () => auth()->user()->hasRole('super_admin'))
                            ->columnSpan(2),

                        Forms\Components\DateTimePicker::make('email_verified_at')
                            ->label('Email Verified At')
                            ->native(false)
                            ->displayFormat('F d, Y h:i A')
                            ->helperText('Leave empty for unverified accounts')
                            ->columnSpan(2),

                        Forms\Components\TextInput::make('password')
                            ->password()
                            ->label('Password')
                            ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                            ->dehydrated(fn ($state) => filled($state))
                            ->required(fn (string $context): bool => $context === 'create')
                            ->maxLength(255)
                            ->placeholder('Enter new password')
                            ->helperText('Leave blank to keep current password when editing')
                            ->revealable()
                            ->columnSpan(2),

                        Forms\Components\TextInput::make('password_confirmation')
                            ->password()
                            ->label('Confirm Password')
                            ->dehydrated(false)
                            ->required(fn (string $context): bool => $context === 'create')
                            ->same('password')
                            ->maxLength(255)
                            ->placeholder('Confirm password')
                            ->revealable()
                            ->columnSpan(2),
                    ])->columns(4),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable()
                    ->weight('medium')
                    ->description(fn (User $record): string => $record->email),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('Email copied!')
                    ->icon('heroicon-o-envelope')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('phone')
                    ->label('Phone')
                    ->searchable()
                    ->icon('heroicon-o-phone')
                    ->placeholder('Not provided')
                    ->toggleable(),

                Tables\Columns\BadgeColumn::make('role')
                    ->label('Type')
                    ->colors([
                        'success' => 'admin',
                        'primary' => 'user',
                    ])
                    ->icons([
                        'heroicon-o-shield-check' => 'admin',
                        'heroicon-o-user' => 'user',
                    ])
                    ->formatStateUsing(fn (string $state): string => match($state) {
                        'admin' => 'Administrator',
                        'user' => 'Job Seeker',
                        default => $state,
                    })
                    ->sortable(),

                Tables\Columns\TextColumn::make('roles.name')
                    ->label('System Role')
                    ->badge()
                    ->color('warning')
                    ->formatStateUsing(fn (string $state): string => match($state) {
                        'super_admin' => 'Super Admin',
                        'hr_manager' => 'HR Manager',
                        'shortlister' => 'Shortlister',
                        'reviewer' => 'Reviewer',
                        default => $state,
                    })
                    ->placeholder('No role assigned')
                    ->toggleable(),

                Tables\Columns\IconColumn::make('email_verified_at')
                    ->label('Verified')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->sortable()
                    ->tooltip(fn (User $record): string => $record->email_verified_at
                        ? 'Verified on ' . $record->email_verified_at->format('M d, Y')
                        : 'Not verified'
                    ),

                Tables\Columns\TextColumn::make('applications_count')
                    ->counts('applications')
                    ->label('Applications')
                    ->badge()
                    ->color(fn ($state): string => $state > 0 ? 'success' : 'gray')
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Registered')
                    ->date('M d, Y')
                    ->sortable()
                    ->description(fn (User $record): string => $record->created_at->diffForHumans())
                    ->toggleable(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime('M d, Y h:i A')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('role')
                    ->options([
                        'user' => 'Job Seekers',
                        'admin' => 'Administrators',
                    ])
                    ->label('User Type'),

                Tables\Filters\SelectFilter::make('roles')
                    ->relationship('roles', 'name')
                    ->options([
                        'super_admin' => 'Super Administrator',
                        'hr_manager' => 'HR Manager',
                        'shortlister' => 'Shortlister',
                        'reviewer' => 'Reviewer',
                    ])
                    ->label('System Role')
                    ->multiple(),

                Tables\Filters\TernaryFilter::make('email_verified_at')
                    ->label('Email Verification')
                    ->placeholder('All users')
                    ->trueLabel('Verified only')
                    ->falseLabel('Unverified only')
                    ->queries(
                        true: fn (Builder $query) => $query->whereNotNull('email_verified_at'),
                        false: fn (Builder $query) => $query->whereNull('email_verified_at'),
                    ),

                Tables\Filters\Filter::make('has_applications')
                    ->label('Has Applications')
                    ->query(fn (Builder $query): Builder => $query->has('applications'))
                    ->toggle(),

                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('registered_from')
                            ->label('Registered From'),
                        Forms\Components\DatePicker::make('registered_until')
                            ->label('Registered Until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['registered_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['registered_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make()
                        ->visible(fn () => auth()->user()->hasAnyRole(['super_admin', 'hr_manager'])),

                    Tables\Actions\Action::make('verify_email')
                        ->label('Verify Email')
                        ->icon('heroicon-o-check-badge')
                        ->color('success')
                        ->requiresConfirmation()
                        ->action(fn (User $record) => $record->update(['email_verified_at' => now()]))
                        ->visible(fn (User $record): bool => is_null($record->email_verified_at) && auth()->user()->hasAnyRole(['super_admin', 'hr_manager'])),

                    Tables\Actions\Action::make('unverify_email')
                        ->label('Unverify Email')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->action(fn (User $record) => $record->update(['email_verified_at' => null]))
                        ->visible(fn (User $record): bool => !is_null($record->email_verified_at) && auth()->user()->hasAnyRole(['super_admin', 'hr_manager'])),

                    Tables\Actions\Action::make('assign_role')
                        ->label('Assign Role')
                        ->icon('heroicon-o-user-plus')
                        ->color('warning')
                        ->form([
                            Forms\Components\Select::make('role_name')
                                ->label('System Role')
                                ->options([
                                    'super_admin' => 'Super Administrator',
                                    'hr_manager' => 'HR Manager',
                                    'shortlister' => 'Shortlister',
                                    'reviewer' => 'Reviewer',
                                ])
                                ->required()
                                ->native(false),
                        ])
                        ->action(function (User $record, array $data) {
                            $record->syncRoles([$data['role_name']]);
                        })
                        ->visible(fn () => auth()->user()->hasRole('super_admin')),

                    Tables\Actions\Action::make('remove_roles')
                        ->label('Remove All Roles')
                        ->icon('heroicon-o-user-minus')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->action(fn (User $record) => $record->syncRoles([]))
                        ->visible(fn (User $record): bool => $record->roles->isNotEmpty() && auth()->user()->hasRole('super_admin')),

                    Tables\Actions\DeleteAction::make()
                        ->visible(fn () => auth()->user()->hasRole('super_admin'))
                        ->requiresConfirmation()
                        ->modalHeading('Delete User')
                        ->modalDescription('Are you sure you want to delete this user? This will also delete all their applications.')
                        ->before(function (User $record) {
                            // Optional: You can add logic to prevent deleting users with active applications
                            // if ($record->applications()->whereIn('status', ['interview', 'accepted'])->exists()) {
                            //     Notification::make()
                            //         ->danger()
                            //         ->title('Cannot delete user')
                            //         ->body('User has active applications.')
                            //         ->send();
                            //     return false;
                            // }
                        }),
                ])->icon('heroicon-o-ellipsis-horizontal')
                    ->tooltip('Actions'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\BulkAction::make('verify_emails')
                        ->label('Verify Emails')
                        ->icon('heroicon-o-check-badge')
                        ->color('success')
                        ->requiresConfirmation()
                        ->action(fn ($records) => $records->each->update(['email_verified_at' => now()]))
                        ->deselectRecordsAfterCompletion()
                        ->visible(fn () => auth()->user()->hasAnyRole(['super_admin', 'hr_manager'])),

                    Tables\Actions\BulkAction::make('assign_role')
                        ->label('Assign Role')
                        ->icon('heroicon-o-user-plus')
                        ->color('warning')
                        ->form([
                            Forms\Components\Select::make('role_name')
                                ->label('System Role')
                                ->options([
                                    'super_admin' => 'Super Administrator',
                                    'hr_manager' => 'HR Manager',
                                    'shortlister' => 'Shortlister',
                                    'reviewer' => 'Reviewer',
                                ])
                                ->required()
                                ->native(false),
                        ])
                        ->action(function ($records, array $data) {
                            $records->each(fn ($record) => $record->syncRoles([$data['role_name']]));
                        })
                        ->deselectRecordsAfterCompletion()
                        ->visible(fn () => auth()->user()->hasRole('super_admin')),

                    Tables\Actions\DeleteBulkAction::make()
                        ->visible(fn () => auth()->user()->hasRole('super_admin'))
                        ->requiresConfirmation()
                        ->modalHeading('Delete Selected Users')
                        ->modalDescription('Are you sure you want to delete these users? This will also delete all their applications.'),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->poll('30s')
            ->striped()
            ->emptyStateHeading('No users found')
            ->emptyStateDescription('Users will appear here once they register.')
            ->emptyStateIcon('heroicon-o-users');
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('User Information')
                    ->schema([
                        Infolists\Components\Split::make([
                            Infolists\Components\Group::make([
                                Infolists\Components\TextEntry::make('name')
                                    ->label('Full Name')
                                    ->size(Infolists\Components\TextEntry\TextEntrySize::Large)
                                    ->weight('bold')
                                    ->color('primary')
                                    ->icon('heroicon-o-user'),

                                Infolists\Components\TextEntry::make('email')
                                    ->label('Email Address')
                                    ->icon('heroicon-o-envelope')
                                    ->copyable()
                                    ->copyMessage('Email copied!')
                                    ->copyMessageDuration(1500),

                                Infolists\Components\TextEntry::make('phone')
                                    ->label('Phone Number')
                                    ->icon('heroicon-o-phone')
                                    ->placeholder('Not provided')
                                    ->copyable(),

                                Infolists\Components\TextEntry::make('bio')
                                    ->label('Biography')
                                    ->placeholder('No bio provided')
                                    ->prose()
                                    ->columnSpanFull(),
                            ]),

                            Infolists\Components\Group::make([
                                Infolists\Components\TextEntry::make('role')
                                    ->label('User Type')
                                    ->badge()
                                    ->color(fn (string $state): string => match($state) {
                                        'admin' => 'success',
                                        'user' => 'primary',
                                    })
                                    ->formatStateUsing(fn (string $state): string => match($state) {
                                        'admin' => 'Administrator',
                                        'user' => 'Job Seeker',
                                    }),

                                Infolists\Components\TextEntry::make('roles.name')
                                    ->label('System Role')
                                    ->badge()
                                    ->color('warning')
                                    ->formatStateUsing(fn (string $state): string => match($state) {
                                        'super_admin' => 'Super Admin',
                                        'hr_manager' => 'HR Manager',
                                        'shortlister' => 'Shortlister',
                                        'reviewer' => 'Reviewer',
                                        default => $state,
                                    })
                                    ->placeholder('No role assigned'),

                                Infolists\Components\IconEntry::make('email_verified_at')
                                    ->label('Email Verified')
                                    ->boolean()
                                    ->trueIcon('heroicon-o-check-badge')
                                    ->falseIcon('heroicon-o-x-circle')
                                    ->trueColor('success')
                                    ->falseColor('danger'),

                                Infolists\Components\TextEntry::make('applications_count')
                                    ->label('Total Applications')
                                    ->state(fn ($record) => $record->applications()->count())
                                    ->badge()
                                    ->color('info')
                                    ->icon('heroicon-o-document-text'),
                            ])->grow(false),
                        ])->from('md'),
                    ]),

                Infolists\Components\Section::make('Application Statistics')
                    ->schema([
                        Infolists\Components\TextEntry::make('pending_applications')
                            ->label('Pending')
                            ->state(fn ($record) => $record->applications()->where('status', 'pending')->count())
                            ->badge()
                            ->color('secondary'),

                        Infolists\Components\TextEntry::make('reviewing_applications')
                            ->label('Under Review')
                            ->state(fn ($record) => $record->applications()->where('status', 'reviewing')->count())
                            ->badge()
                            ->color('warning'),

                        Infolists\Components\TextEntry::make('shortlisted_applications')
                            ->label('Shortlisted')
                            ->state(fn ($record) => $record->applications()->where('status', 'shortlisted')->count())
                            ->badge()
                            ->color('info'),

                        Infolists\Components\TextEntry::make('interview_applications')
                            ->label('Interview')
                            ->state(fn ($record) => $record->applications()->where('status', 'interview')->count())
                            ->badge()
                            ->color('primary'),

                        Infolists\Components\TextEntry::make('accepted_applications')
                            ->label('Accepted')
                            ->state(fn ($record) => $record->applications()->where('status', 'accepted')->count())
                            ->badge()
                            ->color('success'),

                        Infolists\Components\TextEntry::make('rejected_applications')
                            ->label('Rejected')
                            ->state(fn ($record) => $record->applications()->where('status', 'rejected')->count())
                            ->badge()
                            ->color('danger'),
                    ])
                    ->columns(6)
                    ->visible(fn ($record) => $record->applications()->count() > 0),

                Infolists\Components\Section::make('Account Timeline')
                    ->schema([
                        Infolists\Components\TextEntry::make('created_at')
                            ->label('Registered')
                            ->dateTime('F d, Y \a\t h:i A')
                            ->icon('heroicon-o-user-plus'),

                        Infolists\Components\TextEntry::make('created_at')
                            ->label('Member For')
                            ->since()
                            ->icon('heroicon-o-calendar-days'),

                        Infolists\Components\TextEntry::make('email_verified_at')
                            ->label('Email Verified')
                            ->dateTime('F d, Y \a\t h:i A')
                            ->placeholder('Not verified')
                            ->icon('heroicon-o-check-badge'),

                        Infolists\Components\TextEntry::make('updated_at')
                            ->label('Last Updated')
                            ->dateTime('F d, Y \a\t h:i A')
                            ->icon('heroicon-o-arrow-path'),
                    ])
                    ->columns(4)
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('role', 'user')->count();
    }
}

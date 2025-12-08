<?php

namespace App\Filament\Portal\Widgets;
use App\Filament\Portal\Resources\ApplicationResource;
use App\Models\Application;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentApplicationsWidget extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 3;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Application::query()
                    ->with(['user', 'job'])
                    ->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Applicant')
                    ->searchable()
                    ->weight('medium')
                    ->description(fn (Application $record): string => $record->user->email),

                Tables\Columns\TextColumn::make('job.title')
                    ->label('Job Position')
                    ->searchable()
                    ->weight('medium')
                    ->limit(40)
                    ->description(fn (Application $record): ?string => $record->job?->company_name),

                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'secondary' => 'pending',
                        'warning' => 'reviewing',
                        'info' => 'shortlisted',
                        'primary' => 'interview',
                        'success' => 'accepted',
                        'danger' => 'rejected',
                    ]),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Applied')
                    ->since()
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\Action::make('view')
                    ->url(fn (Application $record): string => ApplicationResource::getUrl('view', ['record' => $record]))
                    ->icon('heroicon-o-eye'),
            ]);
    }

    protected function getTableHeading(): string
    {
        return 'Recent Applications';
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DoctorResource\Pages;
use App\Filament\Resources\DoctorResource\RelationManagers;
use App\Models\Doctor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DoctorResource extends Resource
{
    protected static ?string $model = Doctor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Doctors Database';
    protected static ?string $navigationLabel = 'Doctors';
    protected static ?string $label = 'Doctor';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Doctor Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Doctor Name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('specialization_id')
                            ->relationship('specialization', 'name')    
                            ->label('Doctor Specialization')
                            ->required(),
                    ]),
                Forms\Components\Section::make('Available Schedule')
                    ->schema([
                        Forms\Components\Select::make('available_days')
                            ->multiple()
                            ->options([
                                'Monday' => 'Monday',
                                'Tuesday' => 'Tuesday',
                                'Wednesday' => 'Wednesday',
                                'Thursday' => 'Thursday',
                                'Friday' => 'Friday',
                                'Saturday' => 'Saturday',
                                'Sunday' => 'Sunday',
                            ])
                            ->required(),
                        Forms\Components\Select::make('available_time_start')
                            ->label('Available Time Start')
                            ->options([
                                '08:00:00' => '08:00 AM',
                                '09:00:00' => '09:00 AM',
                                '10:00:00' => '10:00 AM',
                                '11:00:00' => '11:00 AM',
                                '12:00:00' => '12:00 PM',
                                '13:00:00' => '01:00 PM',
                                '14:00:00' => '02:00 PM',
                                '15:00:00' => '03:00 PM',
                                '16:00:00' => '04:00 PM',
                                '17:00:00' => '05:00 PM',
                            ])
                            ->required(),
                        Forms\Components\Select::make('available_time_end')
                            ->label('Available Time End')
                                ->options([
                                    '08:00:00' => '08:00 AM',
                                    '09:00:00' => '09:00 AM',
                                    '10:00:00' => '10:00 AM',
                                    '11:00:00' => '11:00 AM',
                                    '12:00:00' => '12:00 PM',
                                    '13:00:00' => '01:00 PM',
                                    '14:00:00' => '02:00 PM',
                                    '15:00:00' => '03:00 PM',
                                    '16:00:00' => '04:00 PM',
                                    '17:00:00' => '05:00 PM',
                                ])
                            ->required(),
                    ])->columns(3)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('specialization.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('available_days')
                    ->label('Available Days')
                    ->formatStateUsing(fn ($state) => implode(', ', json_decode($state))),
                Tables\Columns\TextColumn::make('available_time_start'),
                Tables\Columns\TextColumn::make('available_time_end'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListDoctors::route('/'),
            'create' => Pages\CreateDoctor::route('/create'),
            'edit' => Pages\EditDoctor::route('/{record}/edit'),
        ];
    }
}

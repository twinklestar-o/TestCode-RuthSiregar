<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EkstrakulikulerResource\Pages;
use App\Filament\Resources\EkstrakulikulerResource\RelationManagers;
use App\Models\Ekstrakulikuler;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EkstrakulikulerResource extends Resource
{
    protected static ?string $model = Ekstrakulikuler::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_ekstrakulikuler')
                    ->required()
                    ->columnSpan(2),
                Forms\Components\TextInput::make('nama_penanggungjawab')
                    ->columnSpan(2)
                    ->required(),
                Forms\Components\TextInput::make('no_hp')
                    ->tel()
                    ->columnSpan(2),
                Forms\Components\Radio::make('status')
                    ->options([
                        'aktif' => 'Aktif',
                        'non-aktif' => 'Non Aktif',
                    ])
                    ->required()
                    ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_ekstrakulikuler'),
                Tables\Columns\TextColumn::make('nama_penanggungjawab'),
                Tables\Columns\TextColumn::make('no_hp'),
                Tables\Columns\TextColumn::make('status'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListEkstrakulikulers::route('/'),
            'create' => Pages\CreateEkstrakulikuler::route('/create'),
            'edit' => Pages\EditEkstrakulikuler::route('/{record}/edit'),
        ];
    }
}

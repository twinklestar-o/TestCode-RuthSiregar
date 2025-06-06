<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiswaResource\Pages;
use App\Filament\Resources\SiswaResource\RelationManagers;
use App\Models\Siswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('foto')
                    ->image()
                    ->directory('siswa')
                    ->columnSpan(2)
                    ->required(),
                Forms\Components\TextInput::make('nama_depan')
                    ->required()
                    ->columnSpan(2),
                Forms\Components\TextInput::make('nama_belakang')
                ->columnSpan(2),
                Forms\Components\TextInput::make('no_hp')
                    ->tel()
                    ->columnSpan(2),
                Forms\Components\TextInput::make('nisn')
                    ->unique(ignoreRecord: true)
                    ->required()
                    ->columnSpan(2),
                Forms\Components\Textarea::make('alamat')
                    ->required()
                    ->columnSpan(2),
                Forms\Components\Radio::make('jenis_kelamin')
                    ->options([
                        'L' => 'Laki-Laki',
                        'P' => 'Perempuan',
                    ])
                    ->columnSpan(2)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto'),
                Tables\Columns\TextColumn::make('nama_depan'),
                Tables\Columns\TextColumn::make('nama_belakang'),
                Tables\Columns\TextColumn::make('no_hp'),
                Tables\Columns\TextColumn::make('nisn'),
                Tables\Columns\TextColumn::make('alamat'),
                Tables\Columns\TextColumn::make('jenis_kelamin'),
            ])
            ->filters([])
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
            'index' => Pages\ListSiswas::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'edit' => Pages\EditSiswa::route('/{record}/edit'),
        ];
    }
}
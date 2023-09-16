<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LeadResource\Pages;
use App\Filament\Resources\LeadResource\RelationManagers;
use App\Models\Lead;
use App\Models\Source;
use App\Models\Status;
use App\Models\User;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\Upazila;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class LeadResource extends Resource
{
    protected static ?string $model = Lead::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->columnSpan(3),
                TextInput::make('phone')
                    ->columnSpan(3),
                TextInput::make('email')
                    ->email()
                    ->columnSpan(3),
                TextInput::make('company')
                    ->columnSpan(3),
                Select::make('division')
                    ->options(Division::query()->pluck('name', 'name'))
                    ->live()
                    ->columnSpan(2),
                Select::make('district')
                    ->options(function(Get $get): Collection {
                        $division = Division::query()->where('name', $get('division'))->first();
                        $division_id = $division ? $division->id : null;
                        return District::query()->where('division_id', $division_id)->pluck('name', 'name');
                    })
                    ->live()
                    ->columnSpan(2),
                Select::make('upazila')
                    ->options(function (Get $get): Collection {
                        $district = District::query()->where('name', $get('district'))->first();
                        $district_id = $district ? $district->id : null;
                        return Upazila::query()->where('district_id', $district_id)->pluck('name', 'name');
                    })
                    ->columnSpan(2),
                Select::make('source')
                    ->options(Source::pluck('name', 'name'))
                    ->columnSpan(2),
                Select::make('status_id')
                    ->options(Status::pluck('name', 'id'))
                    ->columnSpan(2),
                Select::make('user_assigned_id')
                    ->options(User::pluck('name', 'id'))
                    ->columnSpan(2),
                Textarea::make('note')
                    ->columnSpan(6),
            ])
            ->columns(6);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('phone'),
                TextColumn::make('email'),
                TextColumn::make('company'),
                TextColumn::make('source')
                    ->toggleable(),
                TextColumn::make('createdBy.name')
                    ->label('Created by')
                    ->toggleable(),
                TextColumn::make('asignedTo.name')
                    ->label('Assigned to')
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->since()
                    ->toggleable(),
                TextColumn::make('updated_at')
                    ->since()
                    ->toggleable(),
                ViewColumn::make('status')
                    ->view('filament.tables.columns.color')                
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    ExportBulkAction::make(),
                    Tables\Actions\DeleteBulkAction::make()
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->recordUrl(null);
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
            'index' => Pages\ListLeads::route('/'),
            'create' => Pages\CreateLead::route('/create'),
            'edit' => Pages\EditLead::route('/{record}/edit'),
        ];
    }    
}

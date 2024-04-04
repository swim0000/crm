<?php

namespace App\Filament\Resources;

use App\Models\Lead;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use App\Filament\Resources\LeadResource\Pages;
use Filament\Forms\Components\Textarea;

class LeadResource extends Resource
{
    protected static ?string $navigationGroup = 'Sellside';
    protected static ?string $model = Lead::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Create a Lead')->schema([
                    TextInput::make('product')->required(),
                    TextInput::make('source')->required(),
                    Select::make('status')->required()
                    ->options([
                        'new' => 'New',
                        'prospect' => 'Prospect',
                        'currently selling' => 'Currently Selling',
                    ]),
                    Textarea::make('description')->rows(5)
                ])->columnSpan(1)->columns(2),
                Group::make()->schema([
                    Section::make('Company')->schema([
                    Select::make('company_id')
                    ->relationship('company', 'name')
                    ->label('Company')
                    ->default(null)
                    ->searchable()
                    ->preload()
                    ->nullable()
                    ->createOptionForm([
                        TextInput::make('name')
                        ->required(),
                        TextInput::make('email')
                        ->email(),
                        TextInput::make('phone')
                        ->tel(),
                        TextInput::make('website'),
                        TextInput::make('address1'),
                        TextInput::make('address2'),
                        TextInput::make('city'),
                        TextInput::make('postcode'),
                    ]),
                ])->columnSpan(1),
                Section::make('Person')->schema([
                    Select::make('person_id')
                    ->relationship('person', 'name')
                    ->label('Person')
                    ->default(null)
                    ->searchable()
                    ->preload()
                    ->nullable()
                    ->createOptionForm([
                        TextInput::make('name')
                        ->required(),
                        TextInput::make('email')
                        ->email(),
                        TextInput::make('phone')
                        ->tel(),
                        TextInput::make('title'),
                        TextInput::make('address1'),
                        TextInput::make('address2'),
                        TextInput::make('city'),
                        TextInput::make('postcode'),
                    ]),
                    
                ])->columnSpan(1), 
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product')
                    ->searchable(),
                Tables\Columns\TextColumn::make('source')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                    Tables\Columns\TextColumn::make('company.name')
                    ->numeric()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('person.name')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListLeads::route('/'),
            'create' => Pages\CreateLead::route('/create'),
            'edit' => Pages\EditLead::route('/{record}/edit'),
        ];
    }
}

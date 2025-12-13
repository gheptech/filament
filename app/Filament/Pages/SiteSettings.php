<?php

namespace App\Filament\Pages;

use App\Models\SiteSetting;
use Filament\Forms;
use Filament\Pages\Page;
use BackedEnum;
use UnitEnum;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Notifications\Notification;

class SiteSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $panel = 'admin'; // ✅ pastikan masuk ke panel admin
    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'Site Settings';
    protected static UnitEnum|string|null $navigationGroup = 'Pengaturan Website';

    protected string $view = 'filament.pages.site-settings';

    public ?SiteSetting $record;
    public ?array $data = [];
    public bool $justMounted = true;

    public function mount(): void
    {
        // Ambil record pertama atau buat default
        $this->record = SiteSetting::first() ?? SiteSetting::create([
            'site_name' => 'My Website',
        ]);

        if ($this->justMounted) {
            $this->form->fill($this->record->toArray());
            $this->justMounted = false; // ✅ hanya sekali
        }
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('site_name')
                ->label('Nama Website')
                ->required(),

            Forms\Components\TextInput::make('company_name')
                ->label('Nama Sekolah/Perusahaan'),

            Forms\Components\FileUpload::make('logo')
                ->label('Logo')
                ->image()
                ->directory('logos')
                ->disk('public'), // ✅ simpan di storage/app/public

            Forms\Components\TextInput::make('tagline')
                ->label('Tagline')
                ->maxLength(255),

            Forms\Components\Textarea::make('address')
                ->label('Alamat'),

            Forms\Components\TextInput::make('phone')
                ->label('Telepon')
                ->tel(),

            Forms\Components\TextInput::make('email')
                ->label('Email')
                ->email(),

            Forms\Components\TextInput::make('facebook')
                ->label('Facebook')
                ->url(),

            Forms\Components\TextInput::make('instagram')
                ->label('Instagram')
                ->url(),

            Forms\Components\TextInput::make('youtube')
                ->label('YouTube')
                ->url(),

            Forms\Components\TextInput::make('linked')
                ->label('Website / Link terkait')
                ->url(),
        ];
    }

    protected function getFormModel(): SiteSetting
    {
        return $this->record;
    }

    protected function getFormStatePath(): string
    {
        return 'data';
    }

    public function save(): void
    {
        $this->record->update($this->form->getState());

        // Notifikasi hanya sekali
        Notification::make()
            ->title('Site settings updated successfully!')
            ->success()
            ->send();

        // Isi ulang form dengan data terbaru
        $this->form->fill($this->record->fresh()->toArray());
    }
    
}
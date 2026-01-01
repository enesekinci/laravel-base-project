<?php

declare(strict_types=1);

namespace App\Livewire\Admin;

use Illuminate\Support\Collection;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;
use Mary\Traits\WithMediaSync;

#[Layout('admin.layouts.app')]
class ComponentsShowcase extends Component
{
    use Toast, WithFileUploads, WithMediaSync;

    // Modal & Drawer states
    public bool $showModal1 = false;

    public bool $showModal2 = false;

    public bool $showModal3 = false;

    public bool $showDrawer = false;

    // Form states
    public string $name = '';

    public string $email = '';

    public string $description = '';

    public ?int $selectedUser = null;

    public array $selectedUsers = [];

    public bool $remember = false;

    public bool $enabled = false;

    public string $radioOption = '';

    public string $groupOption = '';

    public string $color = '#3b82f6';

    public ?int $choiceUserId = null;

    public array $choiceUserIds = [];

    public string $date = '';

    public $file;

    public array $files = [];

    public Collection $library;

    public int $level = 50;

    public array $tags = ['tech', 'gaming'];

    // Table & List data
    public array $tableHeaders = [];

    public array $tableRows = [];

    // UI Component states
    public bool $showAlert = true;

    public int $rating = 3;

    public int $step = 1;

    public bool $swap = false;

    public string $selectedTab = 'users-tab';

    public string $accordionGroup = 'group1';

    public bool $collapseShow = false;

    // Chart data
    public array $chartData = [];

    // Code editor
    public string $code = '';

    // Markdown & Editor
    public string $markdown = '';

    public string $editor = '';

    // Signature
    public string $signature = '';

    // Pin
    public string $pin = '';

    public function mount(): void
    {
        // Initialize table data
        $this->tableHeaders = [
            ['key' => 'id', 'label' => '#', 'sortable' => true],
            ['key' => 'name', 'label' => 'Ad', 'sortable' => true],
            ['key' => 'email', 'label' => 'E-posta'],
            ['key' => 'actions', 'label' => 'İşlemler'],
        ];

        $this->tableRows = [
            ['id' => 1, 'name' => 'Ahmet Yılmaz', 'email' => 'ahmet@example.com'],
            ['id' => 2, 'name' => 'Ayşe Demir', 'email' => 'ayse@example.com'],
            ['id' => 3, 'name' => 'Mehmet Kaya', 'email' => 'mehmet@example.com'],
        ];

        // Initialize library
        $this->library = new Collection;

        // Initialize chart
        $this->chartData = [
            'type' => 'bar',
            'data' => [
                'labels' => ['Ocak', 'Şubat', 'Mart', 'Nisan'],
                'datasets' => [
                    [
                        'label' => 'Satışlar',
                        'data' => [12, 19, 3, 5],
                    ],
                ],
            ],
        ];
    }

    public function showToast(): void
    {
        $this->success('Toast mesajı başarıyla gösterildi!');
    }

    public function showErrorToast(): void
    {
        $this->error('Bu bir hata mesajıdır!');
    }

    public function showWarningToast(): void
    {
        $this->warning('Bu bir uyarı mesajıdır!');
    }

    public function showInfoToast(): void
    {
        $this->info('Bu bir bilgi mesajıdır!');
    }

    public function nextStep(): void
    {
        if ($this->step < 3) {
            $this->step++;
        }
    }

    public function prevStep(): void
    {
        if ($this->step > 1) {
            $this->step--;
        }
    }

    public function randomizeChart(): void
    {
        $this->chartData['data']['datasets'][0]['data'] = [
            fake()->numberBetween(1, 20),
            fake()->numberBetween(1, 20),
            fake()->numberBetween(1, 20),
            fake()->numberBetween(1, 20),
        ];
    }

    public function render()
    {
        // Sample users for select/choices
        $users = [
            ['id' => 1, 'name' => 'Ahmet Yılmaz'],
            ['id' => 2, 'name' => 'Ayşe Demir'],
            ['id' => 3, 'name' => 'Mehmet Kaya'],
            ['id' => 4, 'name' => 'Fatma Şahin'],
        ];

        return view('livewire.admin.components-showcase', [
            'users' => $users,
        ]);
    }
}

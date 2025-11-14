<?php

namespace App\Filament\Portal\Pages;

use App\Models\Application;
use App\Models\Job;
use App\Models\User;
use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Response;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class Reports extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-chart-bar';

    protected static ?string $navigationLabel = 'Reports';

    protected static ?string $navigationGroup = 'System';

    protected static ?int $navigationSort = 2;

    protected static string $view = 'filament.portal.pages.reports';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Applications Report')
                    ->description('Generate detailed reports of job applications')
                    ->schema([
                        Select::make('application_status')
                            ->label('Application Status')
                            ->options([
                                'all' => 'All Statuses',
                                'pending' => 'Pending',
                                'reviewing' => 'Under Review',
                                'shortlisted' => 'Shortlisted',
                                'interview' => 'Interview',
                                'accepted' => 'Accepted',
                                'rejected' => 'Rejected',
                            ])
                            ->default('all')
                            ->native(false),

                        Select::make('application_job')
                            ->label('Job Position')
                            ->options(function () {
                                return Job::pluck('title', 'id')->prepend('All Jobs', 'all');
                            })
                            ->default('all')
                            ->searchable()
                            ->native(false),

                        DatePicker::make('application_date_from')
                            ->label('Date From')
                            ->native(false)
                            ->maxDate(now()),

                        DatePicker::make('application_date_to')
                            ->label('Date To')
                            ->native(false)
                            ->maxDate(now()),
                    ])
                    ->columns(2)
                    ->footerActions([
                        \Filament\Forms\Components\Actions\Action::make('generate_applications_report')
                            ->label('Generate Applications Report')
                            ->icon('heroicon-o-document-arrow-down')
                            ->color('primary')
                            ->action('generateApplicationsReport'),
                    ]),

                Section::make('Jobs Report')
                    ->description('Generate reports of job postings and their performance')
                    ->schema([
                        Select::make('job_status')
                            ->label('Job Status')
                            ->options([
                                'all' => 'All Statuses',
                                'draft' => 'Draft',
                                'published' => 'Published',
                                'closed' => 'Closed',
                            ])
                            ->default('all')
                            ->native(false),

                        Select::make('job_type_filter')
                            ->label('Job Type')
                            ->options([
                                'all' => 'All Types',
                                'Full Time' => 'Full Time',
                                'Part Time' => 'Part Time',
                                'Remote' => 'Remote',
                                'Internship' => 'Internship',
                                'Contract' => 'Contract',
                            ])
                            ->default('all')
                            ->native(false),

                        DatePicker::make('job_date_from')
                            ->label('Posted From')
                            ->native(false)
                            ->maxDate(now()),

                        DatePicker::make('job_date_to')
                            ->label('Posted To')
                            ->native(false)
                            ->maxDate(now()),
                    ])
                    ->columns(2)
                    ->footerActions([
                        \Filament\Forms\Components\Actions\Action::make('generate_jobs_report')
                            ->label('Generate Jobs Report')
                            ->icon('heroicon-o-document-arrow-down')
                            ->color('success')
                            ->action('generateJobsReport'),
                    ]),

                Section::make('Users Report')
                    ->description('Generate reports of registered users and candidates')
                    ->schema([
                        Select::make('user_role_filter')
                            ->label('User Role')
                            ->options([
                                'all' => 'All Roles',
                                'user' => 'Job Seekers',
                                'admin' => 'Administrators',
                            ])
                            ->default('user')
                            ->native(false),

                        Select::make('user_verified')
                            ->label('Email Verification')
                            ->options([
                                'all' => 'All Users',
                                'verified' => 'Verified Only',
                                'unverified' => 'Unverified Only',
                            ])
                            ->default('all')
                            ->native(false),

                        DatePicker::make('user_date_from')
                            ->label('Registered From')
                            ->native(false)
                            ->maxDate(now()),

                        DatePicker::make('user_date_to')
                            ->label('Registered To')
                            ->native(false)
                            ->maxDate(now()),
                    ])
                    ->columns(2)
                    ->footerActions([
                        \Filament\Forms\Components\Actions\Action::make('generate_users_report')
                            ->label('Generate Users Report')
                            ->icon('heroicon-o-document-arrow-down')
                            ->color('info')
                            ->action('generateUsersReport'),
                    ]),

                Section::make('Analytics Summary Report')
                    ->description('Generate comprehensive analytics and statistics')
                    ->schema([
                        DatePicker::make('analytics_date_from')
                            ->label('Period From')
                            ->native(false)
                            ->default(now()->subMonth())
                            ->maxDate(now()),

                        DatePicker::make('analytics_date_to')
                            ->label('Period To')
                            ->native(false)
                            ->default(now())
                            ->maxDate(now()),
                    ])
                    ->columns(2)
                    ->footerActions([
                        \Filament\Forms\Components\Actions\Action::make('generate_analytics_report')
                            ->label('Generate Analytics Report')
                            ->icon('heroicon-o-document-arrow-down')
                            ->color('warning')
                            ->action('generateAnalyticsReport'),
                    ]),
            ])
            ->statePath('data');
    }

    public function generateApplicationsReport()
    {
        $data = $this->form->getState();

        $query = Application::with(['user', 'job']);

        // Apply filters
        if ($data['application_status'] !== 'all') {
            $query->where('status', $data['application_status']);
        }

        if ($data['application_job'] !== 'all') {
            $query->where('job_id', $data['application_job']);
        }

        if (!empty($data['application_date_from'])) {
            $query->whereDate('created_at', '>=', $data['application_date_from']);
        }

        if (!empty($data['application_date_to'])) {
            $query->whereDate('created_at', '<=', $data['application_date_to']);
        }

        $applications = $query->get();

        if ($applications->isEmpty()) {
            Notification::make()
                ->warning()
                ->title('No data found')
                ->body('No applications match the selected criteria.')
                ->send();
            return;
        }

        // Create Excel file
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set headers
        $sheet->setCellValue('A1', 'Applications Report');
        $sheet->mergeCells('A1:H1');
        $sheet->getStyle('A1')->getFont()->setSize(16)->setBold(true);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('A2', 'Generated: ' . now()->format('F d, Y h:i A'));
        $sheet->mergeCells('A2:H2');
        $sheet->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Column headers
        $headers = ['ID', 'Applicant Name', 'Email', 'Phone', 'Job Title', 'Company', 'Status', 'Applied Date'];
        $column = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($column . '4', $header);
            $sheet->getStyle($column . '4')->getFont()->setBold(true);
            $sheet->getStyle($column . '4')->getFill()
                ->setFillType(Fill::FILL_SOLID)
                ->getStartColor()->setRGB('4F46E5');
            $sheet->getStyle($column . '4')->getFont()->getColor()->setRGB('FFFFFF');
            $column++;
        }

        // Data rows
        $row = 5;
        foreach ($applications as $application) {
            $sheet->setCellValue('A' . $row, $application->id);
            $sheet->setCellValue('B' . $row, $application->user->name);
            $sheet->setCellValue('C' . $row, $application->user->email);
            $sheet->setCellValue('D' . $row, $application->user->phone ?? 'N/A');
            $sheet->setCellValue('E' . $row, $application->job->title);
            $sheet->setCellValue('F' . $row, $application->job->company_name);
            $sheet->setCellValue('G' . $row, ucfirst($application->status));
            $sheet->setCellValue('H' . $row, $application->created_at->format('M d, Y'));
            $row++;
        }

        // Auto-size columns
        foreach (range('A', 'H') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Add borders
        $sheet->getStyle('A4:H' . ($row - 1))
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN);

        // Generate file using storage
        $fileName = 'applications_report_' . now()->format('Y-m-d_His') . '.xlsx';
        $filePath = storage_path('app/temp/' . $fileName);

        // Make sure temp directory exists
        if (!file_exists(storage_path('app/temp'))) {
            mkdir(storage_path('app/temp'), 0755, true);
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);

        Notification::make()
            ->success()
            ->title('Report Generated')
            ->body('Applications report has been generated successfully.')
            ->send();

        return Response::download($filePath, $fileName)->deleteFileAfterSend(true);
    }

    public function generateJobsReport()
    {
        $data = $this->form->getState();

        $query = Job::withCount('applications');

        // Apply filters
        if ($data['job_status'] !== 'all') {
            $query->where('status', $data['job_status']);
        }

        if ($data['job_type_filter'] !== 'all') {
            $query->where('job_type', $data['job_type_filter']);
        }

        if (!empty($data['job_date_from'])) {
            $query->whereDate('created_at', '>=', $data['job_date_from']);
        }

        if (!empty($data['job_date_to'])) {
            $query->whereDate('created_at', '<=', $data['job_date_to']);
        }

        $jobs = $query->get();

        if ($jobs->isEmpty()) {
            Notification::make()
                ->warning()
                ->title('No data found')
                ->body('No jobs match the selected criteria.')
                ->send();
            return;
        }

        // Create Excel file
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set headers
        $sheet->setCellValue('A1', 'Jobs Report');
        $sheet->mergeCells('A1:K1');
        $sheet->getStyle('A1')->getFont()->setSize(16)->setBold(true);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('A2', 'Generated: ' . now()->format('F d, Y h:i A'));
        $sheet->mergeCells('A2:K2');
        $sheet->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Column headers
        $headers = ['ID', 'Job Title', 'Company', 'Type', 'Category', 'Location', 'Experience', 'Status', 'Applications', 'Deadline', 'Posted Date'];
        $column = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($column . '4', $header);
            $sheet->getStyle($column . '4')->getFont()->setBold(true);
            $sheet->getStyle($column . '4')->getFill()
                ->setFillType(Fill::FILL_SOLID)
                ->getStartColor()->setRGB('059669');
            $sheet->getStyle($column . '4')->getFont()->getColor()->setRGB('FFFFFF');
            $column++;
        }

        // Data rows
        $row = 5;
        foreach ($jobs as $job) {
            $sheet->setCellValue('A' . $row, $job->id);
            $sheet->setCellValue('B' . $row, $job->title);
            $sheet->setCellValue('C' . $row, $job->company_name);
            $sheet->setCellValue('D' . $row, $job->job_type);
            $sheet->setCellValue('E' . $row, $job->category);
            $sheet->setCellValue('F' . $row, $job->location);
            $sheet->setCellValue('G' . $row, $job->experience_level);
            $sheet->setCellValue('H' . $row, ucfirst($job->status));
            $sheet->setCellValue('I' . $row, $job->applications_count);
            $sheet->setCellValue('J' . $row, $job->deadline->format('M d, Y'));
            $sheet->setCellValue('K' . $row, $job->created_at->format('M d, Y'));
            $row++;
        }

        // Auto-size columns
        foreach (range('A', 'K') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Add borders
        $sheet->getStyle('A4:K' . ($row - 1))
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN);

        // Generate file using storage
        $fileName = 'jobs_report_' . now()->format('Y-m-d_His') . '.xlsx';
        $filePath = storage_path('app/temp/' . $fileName);

        // Make sure temp directory exists
        if (!file_exists(storage_path('app/temp'))) {
            mkdir(storage_path('app/temp'), 0755, true);
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);

        Notification::make()
            ->success()
            ->title('Report Generated')
            ->body('Jobs report has been generated successfully.')
            ->send();

        return Response::download($filePath, $fileName)->deleteFileAfterSend(true);
    }

    public function generateUsersReport()
    {
        $data = $this->form->getState();

        $query = User::withCount('applications');

        // Apply filters
        if ($data['user_role_filter'] !== 'all') {
            $query->where('role', $data['user_role_filter']);
        }

        if ($data['user_verified'] === 'verified') {
            $query->whereNotNull('email_verified_at');
        } elseif ($data['user_verified'] === 'unverified') {
            $query->whereNull('email_verified_at');
        }

        if (!empty($data['user_date_from'])) {
            $query->whereDate('created_at', '>=', $data['user_date_from']);
        }

        if (!empty($data['user_date_to'])) {
            $query->whereDate('created_at', '<=', $data['user_date_to']);
        }

        $users = $query->get();

        if ($users->isEmpty()) {
            Notification::make()
                ->warning()
                ->title('No data found')
                ->body('No users match the selected criteria.')
                ->send();
            return;
        }

        // Create Excel file
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set headers
        $sheet->setCellValue('A1', 'Users Report');
        $sheet->mergeCells('A1:G1');
        $sheet->getStyle('A1')->getFont()->setSize(16)->setBold(true);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('A2', 'Generated: ' . now()->format('F d, Y h:i A'));
        $sheet->mergeCells('A2:G2');
        $sheet->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Column headers
        $headers = ['ID', 'Name', 'Email', 'Phone', 'Role', 'Applications', 'Registered Date'];
        $column = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($column . '4', $header);
            $sheet->getStyle($column . '4')->getFont()->setBold(true);
            $sheet->getStyle($column . '4')->getFill()
                ->setFillType(Fill::FILL_SOLID)
                ->getStartColor()->setRGB('0EA5E9');
            $sheet->getStyle($column . '4')->getFont()->getColor()->setRGB('FFFFFF');
            $column++;
        }

        // Data rows
        $row = 5;
        foreach ($users as $user) {
            $sheet->setCellValue('A' . $row, $user->id);
            $sheet->setCellValue('B' . $row, $user->name);
            $sheet->setCellValue('C' . $row, $user->email);
            $sheet->setCellValue('D' . $row, $user->phone ?? 'N/A');
            $sheet->setCellValue('E' . $row, ucfirst($user->role));
            $sheet->setCellValue('F' . $row, $user->applications_count);
            $sheet->setCellValue('G' . $row, $user->created_at->format('M d, Y'));
            $row++;
        }

        // Auto-size columns
        foreach (range('A', 'G') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Add borders
        $sheet->getStyle('A4:G' . ($row - 1))
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN);

        // Generate file using storage
        $fileName = 'users_report_' . now()->format('Y-m-d_His') . '.xlsx';
        $filePath = storage_path('app/temp/' . $fileName);

        // Make sure temp directory exists
        if (!file_exists(storage_path('app/temp'))) {
            mkdir(storage_path('app/temp'), 0755, true);
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);

        Notification::make()
            ->success()
            ->title('Report Generated')
            ->body('Users report has been generated successfully.')
            ->send();

        return Response::download($filePath, $fileName)->deleteFileAfterSend(true);
    }

    public function generateAnalyticsReport()
    {
        $data = $this->form->getState();

        $dateFrom = $data['analytics_date_from'] ?? now()->subMonth();
        $dateTo = $data['analytics_date_to'] ?? now();

        // Gather analytics data
        $totalJobs = Job::whereBetween('created_at', [$dateFrom, $dateTo])->count();
        $publishedJobs = Job::where('status', 'published')->whereBetween('created_at', [$dateFrom, $dateTo])->count();
        $draftJobs = Job::where('status', 'draft')->whereBetween('created_at', [$dateFrom, $dateTo])->count();
        $closedJobs = Job::where('status', 'closed')->whereBetween('created_at', [$dateFrom, $dateTo])->count();

        $totalApplications = Application::whereBetween('created_at', [$dateFrom, $dateTo])->count();
        $pendingApps = Application::where('status', 'pending')->whereBetween('created_at', [$dateFrom, $dateTo])->count();
        $reviewingApps = Application::where('status', 'reviewing')->whereBetween('created_at', [$dateFrom, $dateTo])->count();
        $shortlistedApps = Application::where('status', 'shortlisted')->whereBetween('created_at', [$dateFrom, $dateTo])->count();
        $interviewApps = Application::where('status', 'interview')->whereBetween('created_at', [$dateFrom, $dateTo])->count();
        $acceptedApps = Application::where('status', 'accepted')->whereBetween('created_at', [$dateFrom, $dateTo])->count();
        $rejectedApps = Application::where('status', 'rejected')->whereBetween('created_at', [$dateFrom, $dateTo])->count();

        $totalUsers = User::where('role', 'user')->whereBetween('created_at', [$dateFrom, $dateTo])->count();

        // Top jobs by applications
        $topJobs = Job::withCount(['applications' => function ($query) use ($dateFrom, $dateTo) {
            $query->whereBetween('created_at', [$dateFrom, $dateTo]);
        }])
            ->having('applications_count', '>', 0)
            ->orderBy('applications_count', 'desc')
            ->limit(10)
            ->get();

        // Create Excel file
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Title
        $sheet->setCellValue('A1', 'Analytics Summary Report');
        $sheet->mergeCells('A1:D1');
        $sheet->getStyle('A1')->getFont()->setSize(18)->setBold(true);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('A2', 'Period: ' . Carbon::parse($dateFrom)->format('M d, Y') . ' - ' . Carbon::parse($dateTo)->format('M d, Y'));
        $sheet->mergeCells('A2:D2');
        $sheet->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('A3', 'Generated: ' . now()->format('F d, Y h:i A'));
        $sheet->mergeCells('A3:D3');
        $sheet->getStyle('A3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $row = 5;

        // Jobs Statistics
        $sheet->setCellValue('A' . $row, 'JOB STATISTICS');
        $sheet->getStyle('A' . $row)->getFont()->setBold(true)->setSize(14);
        $sheet->mergeCells('A' . $row . ':D' . $row);
        $row += 2;

        $sheet->setCellValue('A' . $row, 'Total Jobs Posted');
        $sheet->setCellValue('B' . $row, $totalJobs);
        $row++;
        $sheet->setCellValue('A' . $row, 'Published Jobs');
        $sheet->setCellValue('B' . $row, $publishedJobs);
        $row++;
        $sheet->setCellValue('A' . $row, 'Draft Jobs');
        $sheet->setCellValue('B' . $row, $draftJobs);
        $row++;
        $sheet->setCellValue('A' . $row, 'Closed Jobs');
        $sheet->setCellValue('B' . $row, $closedJobs);
        $row += 2;

        // Applications Statistics
        $sheet->setCellValue('A' . $row, 'APPLICATION STATISTICS');
        $sheet->getStyle('A' . $row)->getFont()->setBold(true)->setSize(14);
        $sheet->mergeCells('A' . $row . ':D' . $row);
        $row += 2;

        $sheet->setCellValue('A' . $row, 'Total Applications');
        $sheet->setCellValue('B' . $row, $totalApplications);
        $row++;
        $sheet->setCellValue('A' . $row, 'Pending');
        $sheet->setCellValue('B' . $row, $pendingApps);
        $row++;
        $sheet->setCellValue('A' . $row, 'Reviewing');
        $sheet->setCellValue('B' . $row, $reviewingApps);
        $row++;
        $sheet->setCellValue('A' . $row, 'Shortlisted');
        $sheet->setCellValue('B' . $row, $shortlistedApps);
        $row++;
        $sheet->setCellValue('A' . $row, 'Interview');
        $sheet->setCellValue('B' . $row, $interviewApps);
        $row++;
        $sheet->setCellValue('A' . $row, 'Accepted');
        $sheet->setCellValue('B' . $row, $acceptedApps);
        $row++;
        $sheet->setCellValue('A' . $row, 'Rejected');
        $sheet->setCellValue('B' . $row, $rejectedApps);
        $row += 2;

        // User Statistics
        $sheet->setCellValue('A' . $row, 'USER STATISTICS');
        $sheet->getStyle('A' . $row)->getFont()->setBold(true)->setSize(14);
        $sheet->mergeCells('A' . $row . ':D' . $row);
        $row += 2;

        $sheet->setCellValue('A' . $row, 'New Registrations');
        $sheet->setCellValue('B' . $row, $totalUsers);
        $row += 2;

        // Top Jobs
        if ($topJobs->isNotEmpty()) {
            $sheet->setCellValue('A' . $row, 'TOP 10 JOBS BY APPLICATIONS');
            $sheet->getStyle('A' . $row)->getFont()->setBold(true)->setSize(14);
            $sheet->mergeCells('A' . $row . ':D' . $row);
            $row += 2;

            $sheet->setCellValue('A' . $row, 'Job Title');
            $sheet->setCellValue('B' . $row, 'Company');
            $sheet->setCellValue('C' . $row, 'Type');
            $sheet->setCellValue('D' . $row, 'Applications');
            $sheet->getStyle('A' . $row . ':D' . $row)->getFont()->setBold(true);
            $row++;

            foreach ($topJobs as $job) {
                $sheet->setCellValue('A' . $row, $job->title);
                $sheet->setCellValue('B' . $row, $job->company_name);
                $sheet->setCellValue('C' . $row, $job->job_type);
                $sheet->setCellValue('D' . $row, $job->applications_count);
                $row++;
            }
        }

        // Auto-size columns
        foreach (range('A', 'D') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Generate file using storage
        $fileName = 'analytics_report_' . now()->format('Y-m-d_His') . '.xlsx';
        $filePath = storage_path('app/temp/' . $fileName);

        // Make sure temp directory exists
        if (!file_exists(storage_path('app/temp'))) {
            mkdir(storage_path('app/temp'), 0755, true);
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);

        Notification::make()
            ->success()
            ->title('Report Generated')
            ->body('Analytics report has been generated successfully.')
            ->send();

        return Response::download($filePath, $fileName)->deleteFileAfterSend(true);
    }

}

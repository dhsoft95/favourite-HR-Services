@extends('layouts.main')

@section('navigation')
    @include('patrials.heander')
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="relative h-[450px] overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
             style="background-image: url('/images/solutions/solutions-bg.webp');">
            <div class="absolute inset-0 bg-black/40"></div>
        </div>

        <div class="relative h-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full">
                <div class="flex items-center h-full">
                    <div class="max-w-3xl">
                        <h1 class="text-white text-6xl lg:text-7xl font-bold mb-6">
                            Our Solutions
                        </h1>
                        <p class="text-xl lg:text-2xl text-white/90 leading-relaxed">
                            Comprehensive HR services designed to support your people, strengthen your organization, and drive sustainable growth.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Solutions Section -->
    <section class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Recruitment and Selection -->
            <div class="mb-32">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <div>
                        <h2 class="text-4xl lg:text-5xl font-bold mb-6" style="color: #151457;">
                            Recruitment & Selection
                        </h2>
                        <p class="text-lg text-gray-700 mb-8 leading-relaxed">
                            With extensive experience, skills, and knowledge, FHS uses advanced technology to identify, capture, and select suitable candidates that fit clients' criteria. We are trusted for meeting or surpassing customers' needs by supplying reliable and retainable workforce.
                        </p>
                        <div class="bg-white rounded-xl p-6 shadow-md">
                            <h3 class="text-xl font-semibold mb-4" style="color: #151457;">Industries We Serve</h3>
                            <div class="grid grid-cols-2 gap-3">
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(21, 20, 87, 0.05); border-color: #151457;">
                                    <span class="font-medium text-sm">Telecom</span>
                                </div>
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(21, 20, 87, 0.05); border-color: #151457;">
                                    <span class="font-medium text-sm">Health</span>
                                </div>
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(21, 20, 87, 0.05); border-color: #151457;">
                                    <span class="font-medium text-sm">Insurance</span>
                                </div>
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(21, 20, 87, 0.05); border-color: #151457;">
                                    <span class="font-medium text-sm">Academic</span>
                                </div>
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(21, 20, 87, 0.05); border-color: #151457;">
                                    <span class="font-medium text-sm">Finance</span>
                                </div>
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(21, 20, 87, 0.05); border-color: #151457;">
                                    <span class="font-medium text-sm">Printing</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <img src="/images/solutions/Recruitment.jpg" alt="Recruitment and Selection"
                             class="w-full h-[500px] object-cover rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                    </div>
                </div>
            </div>

            <!-- Start-Up Company Guidance -->
            <div class="mb-32">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <div class="lg:order-2">
                        <h2 class="text-4xl lg:text-5xl font-bold mb-6" style="color: #151457;">
                            Start-Up Guidance
                        </h2>
                        <p class="text-lg text-gray-700 mb-8 leading-relaxed">
                            Providing consultancy to start-up companies is another core service we offer. FHS works hand in hand with clients who are new to the country or who did not have HR team to build the entire HR department.
                        </p>
                        <div class="bg-white rounded-xl p-6 shadow-md">
                            <h3 class="text-xl font-semibold mb-4" style="color: #151457;">Seven Functional HR Areas</h3>
                            <div class="grid grid-cols-1 gap-3">
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(239, 68, 68, 0.05); border-color: #ef4444;">
                                    <span class="font-medium text-sm">Strategic Management</span>
                                </div>
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(239, 68, 68, 0.05); border-color: #ef4444;">
                                    <span class="font-medium text-sm">Workforce Planning and Employment</span>
                                </div>
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(239, 68, 68, 0.05); border-color: #ef4444;">
                                    <span class="font-medium text-sm">Human Resource Development</span>
                                </div>
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(239, 68, 68, 0.05); border-color: #ef4444;">
                                    <span class="font-medium text-sm">Benefits and Compensation</span>
                                </div>
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(239, 68, 68, 0.05); border-color: #ef4444;">
                                    <span class="font-medium text-sm">Employee and Labour Relations</span>
                                </div>
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(239, 68, 68, 0.05); border-color: #ef4444;">
                                    <span class="font-medium text-sm">Occupational Health, Safety, and Security</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lg:order-1">
                        <img src="/images/solutions/Start-Up Company.jpg" alt="Start-Up Company Guidance"
                             class="w-full h-[500px] object-cover rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                    </div>
                </div>
            </div>

            <!-- Corporate Training -->
            <div class="mb-32">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <div>
                        <h2 class="text-4xl lg:text-5xl font-bold mb-6" style="color: #151457;">
                            Corporate Training
                        </h2>
                        <p class="text-lg text-gray-700 mb-8 leading-relaxed">
                            We regard employee training and development as key factors for growth of an organization. FHS supports companies in training and career development by analyzing, designing, developing and delivering knowledge to staff.
                        </p>
                        <div class="bg-white rounded-xl p-6 shadow-md">
                            <h3 class="text-xl font-semibold mb-4" style="color: #151457;">Training Programs</h3>
                            <div class="grid grid-cols-2 gap-3">
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(21, 20, 87, 0.05); border-color: #151457;">
                                    <span class="font-medium text-sm">Team Building</span>
                                </div>
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(21, 20, 87, 0.05); border-color: #151457;">
                                    <span class="font-medium text-sm">Leadership</span>
                                </div>
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(21, 20, 87, 0.05); border-color: #151457;">
                                    <span class="font-medium text-sm">Communication</span>
                                </div>
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(21, 20, 87, 0.05); border-color: #151457;">
                                    <span class="font-medium text-sm">Customer Service</span>
                                </div>
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(21, 20, 87, 0.05); border-color: #151457;">
                                    <span class="font-medium text-sm">Time Management</span>
                                </div>
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(21, 20, 87, 0.05); border-color: #151457;">
                                    <span class="font-medium text-sm">Decision Making</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <img src="/images/solutions/corporate-training.jpg" alt="Corporate Training"
                             class="w-full h-[500px] object-cover rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                    </div>
                </div>
            </div>

            <!-- Background Checks -->
            <div class="mb-32">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <div class="lg:order-2">
                        <h2 class="text-4xl lg:text-5xl font-bold mb-6" style="color: #151457;">
                            Background Checks
                        </h2>
                        <p class="text-lg text-gray-700 mb-8 leading-relaxed">
                            FHS properly screens candidates for career opportunities. This is one of the most informative ways to collect data quickly and efficiently to help companies make informed decisions regarding prospective job applicants.
                        </p>
                        <div class="bg-white rounded-xl p-6 shadow-md">
                            <h3 class="text-xl font-semibold mb-4" style="color: #151457;">Screening Services</h3>
                            <div class="grid grid-cols-1 gap-3">
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(239, 68, 68, 0.05); border-color: #ef4444;">
                                    <span class="font-medium text-sm">Identity Verification</span>
                                </div>
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(239, 68, 68, 0.05); border-color: #ef4444;">
                                    <span class="font-medium text-sm">Employment History</span>
                                </div>
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(239, 68, 68, 0.05); border-color: #ef4444;">
                                    <span class="font-medium text-sm">Reference Checks</span>
                                </div>
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(239, 68, 68, 0.05); border-color: #ef4444;">
                                    <span class="font-medium text-sm">Criminal Records</span>
                                </div>
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(239, 68, 68, 0.05); border-color: #ef4444;">
                                    <span class="font-medium text-sm">Academic Verification</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lg:order-1">
                        <img src="/images/solutions/background-checks.webp" alt="Background Checks"
                             class="w-full h-[500px] object-cover rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                    </div>
                </div>
            </div>

            <!-- Salary and Benefits Survey -->
            <div class="mb-32">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <div>
                        <h2 class="text-4xl lg:text-5xl font-bold mb-6" style="color: #151457;">
                            Salary & Benefits Survey
                        </h2>
                        <p class="text-lg text-gray-700 mb-8 leading-relaxed">
                            FHS helps employers and employees understand what different jobs pay in different geographic areas, industries, and roles to identify trends in wage and salary levels. This way employers benchmark their salaries against competitors.
                        </p>
                        <div class="bg-white rounded-xl p-6 shadow-md">
                            <h3 class="text-xl font-semibold mb-4" style="color: #151457;">Survey Analysis</h3>
                            <div class="grid grid-cols-1 gap-3">
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(21, 20, 87, 0.05); border-color: #151457;">
                                    <span class="font-medium text-sm">Geographic Areas Analysis</span>
                                </div>
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(21, 20, 87, 0.05); border-color: #151457;">
                                    <span class="font-medium text-sm">Industry Standards Research</span>
                                </div>
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(21, 20, 87, 0.05); border-color: #151457;">
                                    <span class="font-medium text-sm">Role Classifications</span>
                                </div>
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(21, 20, 87, 0.05); border-color: #151457;">
                                    <span class="font-medium text-sm">Wage Trends Identification</span>
                                </div>
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(21, 20, 87, 0.05); border-color: #151457;">
                                    <span class="font-medium text-sm">Competitive Benchmarking</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <img src="/images/solutions/salary-benefits-survey.jpg" alt="Salary and Benefits Survey"
                             class="w-full h-[500px] object-cover rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                    </div>
                </div>
            </div>

            <!-- HR Documents & Reports -->
            <div class="mb-32">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <div class="lg:order-2">
                        <h2 class="text-4xl lg:text-5xl font-bold mb-6" style="color: #151457;">
                            HR Documents & Reports
                        </h2>
                        <p class="text-lg text-gray-700 mb-8 leading-relaxed">
                            In contemporary HR world, HR departments are overwhelmed by multiple paperwork. FHS can help organizations create the right templates for forms, contracts, memos, and letters for the HR department.
                        </p>
                        <div class="bg-white rounded-xl p-6 shadow-md">
                            <h3 class="text-xl font-semibold mb-4" style="color: #151457;">Professional Documentation</h3>
                            <div class="grid grid-cols-2 gap-3">
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(239, 68, 68, 0.05); border-color: #ef4444;">
                                    <span class="font-medium text-sm">Employee Handbooks</span>
                                </div>
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(239, 68, 68, 0.05); border-color: #ef4444;">
                                    <span class="font-medium text-sm">Company Policies</span>
                                </div>
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(239, 68, 68, 0.05); border-color: #ef4444;">
                                    <span class="font-medium text-sm">Employment Contracts</span>
                                </div>
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(239, 68, 68, 0.05); border-color: #ef4444;">
                                    <span class="font-medium text-sm">Payroll Forms</span>
                                </div>
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(239, 68, 68, 0.05); border-color: #ef4444;">
                                    <span class="font-medium text-sm">Emergency Contacts</span>
                                </div>
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(239, 68, 68, 0.05); border-color: #ef4444;">
                                    <span class="font-medium text-sm">Compliance Forms</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lg:order-1">
                        <img src="/images/solutions/hr-documents-reports.jpg" alt="HR Documents & Reports"
                             class="w-full h-[500px] object-cover rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                    </div>
                </div>
            </div>

            <!-- Organizational Chart Structure -->
            <div class="mb-32">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <div>
                        <h2 class="text-4xl lg:text-5xl font-bold mb-6" style="color: #151457;">
                            Organizational Chart & Structure
                        </h2>
                        <p class="text-lg text-gray-700 mb-8 leading-relaxed">
                            FHS helps all sizes of companies to create organizational chart, an essential factor for planning and using resources wisely. FHS uses up to date software in compiling company information and designs an organization structure using numerous criteria.
                        </p>
                        <div class="bg-white rounded-xl p-6 shadow-md">
                            <h3 class="text-xl font-semibold mb-4" style="color: #151457;">Design Criteria</h3>
                            <div class="grid grid-cols-2 gap-3">
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(21, 20, 87, 0.05); border-color: #151457;">
                                    <span class="font-medium text-sm">Functions</span>
                                </div>
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(21, 20, 87, 0.05); border-color: #151457;">
                                    <span class="font-medium text-sm">Territories</span>
                                </div>
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(21, 20, 87, 0.05); border-color: #151457;">
                                    <span class="font-medium text-sm">Products</span>
                                </div>
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(21, 20, 87, 0.05); border-color: #151457;">
                                    <span class="font-medium text-sm">Customers</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <img src="/images/solutions/organizational-chart.webp" alt="Organizational Chart Structure"
                             class="w-full h-[500px] object-cover rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                    </div>
                </div>
            </div>

            <!-- Human Resources Audit -->
            <div class="mb-32">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <div class="lg:order-2">
                        <h2 class="text-4xl lg:text-5xl font-bold mb-6" style="color: #151457;">
                            Human Resources Audit
                        </h2>
                        <p class="text-lg text-gray-700 mb-8 leading-relaxed">
                            HR AUDIT refers to comprehensive inspection of organization's HR department. The audit includes assessment of current HR functions, structure, systems, procedures, and value, delivered to an organization. The focus is to identify relevant effectiveness (or lack thereof) of human resource management practices within an organization as well as to measure compliance with ever-changing rules and regulations. A properly executed audit will reveal potential areas of concern and provide recommendations for their remedy.
                        </p>
                        <div class="bg-white rounded-xl p-6 shadow-md">
                            <h3 class="text-xl font-semibold mb-4" style="color: #151457;">Audited Sections Include</h3>
                            <div class="grid grid-cols-2 gap-3">
                                <div class="p-2 rounded-lg border-l-4" style="background-color: rgba(239, 68, 68, 0.05); border-color: #ef4444;">
                                    <span class="font-medium text-sm">Training and Development</span>
                                </div>
                                <div class="p-2 rounded-lg border-l-4" style="background-color: rgba(239, 68, 68, 0.05); border-color: #ef4444;">
                                    <span class="font-medium text-sm">Recruitment Practices</span>
                                </div>
                                <div class="p-2 rounded-lg border-l-4" style="background-color: rgba(239, 68, 68, 0.05); border-color: #ef4444;">
                                    <span class="font-medium text-sm">Termination Process</span>
                                </div>
                                <div class="p-2 rounded-lg border-l-4" style="background-color: rgba(239, 68, 68, 0.05); border-color: #ef4444;">
                                    <span class="font-medium text-sm">Benefits & Compensation</span>
                                </div>
                                <div class="p-2 rounded-lg border-l-4" style="background-color: rgba(239, 68, 68, 0.05); border-color: #ef4444;">
                                    <span class="font-medium text-sm">Employee Relations</span>
                                </div>
                                <div class="p-2 rounded-lg border-l-4" style="background-color: rgba(239, 68, 68, 0.05); border-color: #ef4444;">
                                    <span class="font-medium text-sm">Health & Safety</span>
                                </div>
                                <div class="p-2 rounded-lg border-l-4" style="background-color: rgba(239, 68, 68, 0.05); border-color: #ef4444;">
                                    <span class="font-medium text-sm">Performance Management</span>
                                </div>
                                <div class="p-2 rounded-lg border-l-4" style="background-color: rgba(239, 68, 68, 0.05); border-color: #ef4444;">
                                    <span class="font-medium text-sm">Communications</span>
                                </div>
                                <div class="p-2 rounded-lg border-l-4" style="background-color: rgba(239, 68, 68, 0.05); border-color: #ef4444;">
                                    <span class="font-medium text-sm">HR Policies</span>
                                </div>
                                <div class="p-2 rounded-lg border-l-4" style="background-color: rgba(239, 68, 68, 0.05); border-color: #ef4444;">
                                    <span class="font-medium text-sm">Employee Welfare</span>
                                </div>
                                <div class="p-2 rounded-lg border-l-4" style="background-color: rgba(239, 68, 68, 0.05); border-color: #ef4444;">
                                    <span class="font-medium text-sm">HR Strategic Issues</span>
                                </div>
                                <div class="p-2 rounded-lg border-l-4" style="background-color: rgba(239, 68, 68, 0.05); border-color: #ef4444;">
                                    <span class="font-medium text-sm">Budgeting</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lg:order-1">
                        <img src="/images/solutions/hr-audit.webp" alt="Human Resources Audit"
                             class="w-full h-[500px] object-cover rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                    </div>
                </div>
            </div>

            <!-- Job Analysis, Documentation and Evaluation -->
            <div class="mb-32">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <div>
                        <h2 class="text-4xl lg:text-5xl font-bold mb-6" style="color: #151457;">
                            Job Analysis, Job Documentation & Job Evaluation
                        </h2>
                        <p class="text-lg text-gray-700 mb-8 leading-relaxed">
                            We conduct job analysis through data collection and investigation, describe positions clearly in written form, and evaluate roles effectively. This relieves HR departments of the burden of analyzing, documenting, and evaluating positions.
                        </p>
                        <div class="bg-white rounded-xl p-6 shadow-md">
                            <h3 class="text-xl font-semibold mb-4" style="color: #151457;">Our Process</h3>
                            <div class="grid grid-cols-1 gap-3">
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(21, 20, 87, 0.05); border-color: #151457;">
                                    <span class="font-medium text-sm">Data Collection & Investigation</span>
                                </div>
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(21, 20, 87, 0.05); border-color: #151457;">
                                    <span class="font-medium text-sm">Position Documentation</span>
                                </div>
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(21, 20, 87, 0.05); border-color: #151457;">
                                    <span class="font-medium text-sm">Role Evaluation</span>
                                </div>
                                <div class="p-3 rounded-lg border-l-4" style="background-color: rgba(21, 20, 87, 0.05); border-color: #151457;">
                                    <span class="font-medium text-sm">Performance Requirements</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <img src="/images/solutions/job-analysis.webp" alt="Job Analysis, Job Documentation & Job Evaluation"
                             class="w-full h-[500px] object-cover rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('footer')
    @include('patrials.footer')
@endsection

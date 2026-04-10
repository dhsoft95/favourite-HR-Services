<?php

namespace App\Livewire;

use App\Models\Application;
use App\Models\Job;
use App\Models\User;
use App\Notifications\ApplicationSubmitted;
use App\Notifications\NewApplicationReceived;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ApplyJobModal extends Component
{
    use WithFileUploads;

    public $jobId;
    public $job;
    public $cv;
    public $coverLetter = '';
    public $showModal = false;

    // Use the new #[On] attribute for Livewire v3
    #[On('openApplyModal')]
    public function openApplyModal($jobId)
    {
        $this->jobId = $jobId;

        try {
            $this->job = Job::findOrFail($jobId);
        } catch (\Exception $e) {
            $this->dispatch('show-alert', [
                'type' => 'error',
                'message' => 'Job not found. Please try again.'
            ]);
            return;
        }

        // Check if user already applied
        $hasApplied = Application::where('job_id', $this->jobId)
            ->where('user_id', auth()->id())
            ->exists();

        if ($hasApplied) {
            $this->dispatch('show-alert', [
                'type' => 'warning',
                'message' => 'You have already applied for this job.'
            ]);
            return;
        }

        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->reset(['cv', 'coverLetter', 'jobId']);
        $this->resetValidation();
    }

    public function submit()
    {
        try {
            // Validate
            $this->validate([
                'cv' => 'required|file|mimes:pdf,doc,docx|max:5120', // 5MB max
                'coverLetter' => 'nullable|string|max:1000',
            ]);

            // Store CV
            $fileName = str(auth()->user()->name)->slug() . '-cv-' . time() . '.' . $this->cv->getClientOriginalExtension();
            $cvPath = $this->cv->storeAs('cvs', $fileName, 'public');

            // Create application
            $application = Application::create([
                'user_id' => auth()->id(),
                'job_id' => $this->jobId,
                'cv_path' => $cvPath,
                'cover_letter' => $this->coverLetter,
                'status' => 'pending',
            ]);

            // Send notification to user
            try {
                auth()->user()->notify(new ApplicationSubmitted($application));
            } catch (\Exception $e) {
                \Log::error('Failed to send application notification to user: ' . $e->getMessage());
            }

            // Send notification to all admins
            try {
                $admins = User::where('role', 'admin')->get();
                foreach ($admins as $admin) {
                    $admin->notify(new NewApplicationReceived($application));
                }
            } catch (\Exception $e) {
                \Log::error('Failed to send notification to admins: ' . $e->getMessage());
            }

            $this->closeModal();

            // Dispatch success event
            $this->dispatch('application-submitted', [
                'title' => 'Application Submitted!',
                'message' => 'Your application for ' . $this->job->title . ' has been successfully submitted. We will review it and get back to you soon.',
                'jobTitle' => $this->job->title
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation errors
            $errors = $e->validator->errors()->all();
            $this->dispatch('show-alert', [
                'type' => 'error',
                'message' => implode(' ', $errors)
            ]);
        } catch (\Exception $e) {
            // General errors
            \Log::error('Application submission error: ' . $e->getMessage());

            $this->dispatch('show-alert', [
                'type' => 'error',
                'message' => 'Failed to submit application. Please try again.'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.apply-job-modal');
    }
}

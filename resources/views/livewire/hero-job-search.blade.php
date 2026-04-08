<div class="search-wrapper">
    <form wire:submit.prevent="searchJobs" class="form-grid">
        <div class="form-group">
            <label for="job-title" class="form-label">Job Title</label>
            <input type="text"
                   id="job-title"
                   wire:model.defer="search"
                   placeholder="e.g. Software Engineer"
                   class="form-input">
        </div>
        <div class="form-group">
            <label for="location" class="form-label">Location</label>
            <select id="location" wire:model.defer="location" class="form-select">
                <option value="">All Locations</option>
                <option value="dodoma">Dodoma</option>
                <option value="dar-es-salaam">Dar es Salaam</option>
                <option value="arusha">Arusha</option>
                <option value="mwanza">Mwanza</option>
                <option value="remote">Remote</option>
            </select>
        </div>
        <div class="form-group">
            <label for="category" class="form-label">Category</label>
            <select id="category" wire:model.defer="category" class="form-select">
                <option value="">All Categories</option>
                <option value="technology">Technology</option>
                <option value="finance">Finance</option>
                <option value="healthcare">Healthcare</option>
                <option value="marketing">Marketing</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit"
                    class="search-button"
                    wire:loading.attr="disabled"
                    wire:loading.class="opacity-75">
                <span wire:loading.remove>Search Jobs</span>
                <span wire:loading>Searching...</span>
            </button>
        </div>
    </form>
</div>

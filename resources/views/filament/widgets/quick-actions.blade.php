<x-filament-widgets::widget>
    <x-filament::section>
        <div class="space-y-4">
    <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        {{-- New Page --}}
        <a :href="$getPagesCreateUrl()"
           class="group block p-6 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 border-2 border-transparent hover:border-blue-400">
            <div class="text-3xl mb-3 group-hover:scale-110 transition-transform">📄</div>
            <h4 class="font-bold text-lg mb-1">New Page</h4>
            <p class="text-blue-100 text-sm opacity-90">Create website content</p>
        </a>

        {{-- New Program --}}
        <a :href="$getProgramsCreateUrl()"
           class="group block p-6 bg-gradient-to-r from-emerald-500 to-teal-600 text-white rounded-xl hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 border-2 border-transparent hover:border-emerald-400">
            <div class="text-3xl mb-3 group-hover:scale-110 transition-transform">📋</div>
            <h4 class="font-bold text-lg mb-1">New Program</h4>
            <p class="text-emerald-100 text-sm opacity-90">Add radiology program</p>
        </a>

        {{-- Pending Enquiries --}}
        <a
            :href="$getContactEnquiriesPendingUrl()"
           class="group block p-6 bg-gradient-to-r from-orange-500 to-red-600 text-white rounded-xl hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 border-2 border-transparent hover:border-orange-400">
            <div class="text-3xl mb-3 group-hover:scale-110 transition-transform">🔔</div>
            <h4 class="font-bold text-lg mb-1">Pending Enquiries waiting</h4>
            <p class="text-orange-100 text-sm opacity-90">{{ App\Models\ContactEnquiry::where('status', 'pending')->count() }} waiting</p>
        </a>

        {{-- New Category --}}
        <a :href="$getCategoriesCreateUrl()"
           class="group block p-6 bg-gradient-to-r from-purple-500 to-indigo-600 text-white rounded-xl hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 border-2 border-transparent hover:border-purple-400">
            <div class="text-3xl mb-3 group-hover:scale-110 transition-transform">📁</div>
            <h4 class="font-bold text-lg mb-1">New Category</h4>
            <p class="text-purple-100 text-sm opacity-90">Organize programs</p>
        </a>
    </div>
</div>

    </x-filament::section>
</x-filament-widgets::widget>

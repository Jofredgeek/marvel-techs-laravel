<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-[var(--heading)]">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-[var(--muted)]">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before
            deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Delete
        Account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-[var(--heading)]">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-[var(--muted)]">
                Cette action est définitive. Toutes les données associées au compte seront supprimées.
            </p>

            @if ($user->password)
            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input id="password" name="password" type="password" class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}" />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>
            @else
            <label class="mt-6 flex items-start gap-3 rounded-xl border border-[var(--danger)]/25 bg-[var(--danger)]/5 p-4">
                <input type="checkbox" name="confirm_deletion" value="1"
                    class="mt-0.5 rounded border-[var(--border)] text-[var(--danger)] focus:ring-[var(--danger)]">
                <span class="text-sm text-[var(--text)]">Je confirme vouloir supprimer définitivement mon compte.</span>
            </label>
            <x-input-error :messages="$errors->userDeletion->get('confirm_deletion')" class="mt-2" />
            @endif

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>

<div class="mt-10 flex flex-col items-center justify-center">
    <p class="text-fg-danger-strong mt-2.5 text-sm text-green-500">{{ session('status') }}</p>
    <div class="w-60">

        <form class="flex flex-col gap-3" wire:submit.prevent="createUser">
            <label for="email">email</label>
            <input type="text" wire:model="email" id="email" class="rounded-lg border-2 border-blue-400 p-1">
            @error('email')
                <p class="text-fg-danger-strong mt-2.5 text-sm text-red-500">{{ $message }}</p>
            @enderror

            <label for="name">username</label>
            <input type="text" wire:model="name" id="name" class="rounded-lg border-2 border-blue-400 p-1">
            @error('name')
                <p class="text-fg-danger-strong mt-2.5 text-sm text-red-500">{{ $message }}</p>
            @enderror
            <label for="password">password</label>
            <input type="password" wire:model="password" id="password" class="rounded-lg border-2 border-blue-400 p-1">
            @error('password')
                <p class="text-fg-danger-strong mt-2.5 text-sm text-red-500">{{ $message }}</p>
            @enderror

            <div class="">

                <div class="mt-2 flex justify-center rounded-lg border border-dashed border-white/25 px-6 py-10">
                    <div class="text-center">
                        <svg viewBox="0 0 24 24" fill="currentColor" data-slot="icon" aria-hidden="true"
                            class="mx-auto size-12 text-gray-600">
                            <path
                                d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z"
                                clip-rule="evenodd" fill-rule="evenodd" />
                        </svg>
                        <div class="mt-4 flex text-sm/6 text-gray-400">
                            <label for="avatar" "
                                class="relative cursor-pointer rounded-md bg-transparent font-semibold text-indigo-400 focus-within:outline-2 focus-within:outline-offset-2 focus-within:outline-indigo-500 hover:text-indigo-300">
                                <span>Upload Gambar</span>
                                <input id="avatar" type="file" name="avatar" wire:model="avatar"
                                    accept="image/png, image/jpg, image/webp, image/avif"/>
                            </label>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs/5 text-gray-400">PNG, JPG, GIF up to 10MB</p>
                    </div>
                </div>
                <div class="">
                    <p>preview</p>
                      <div wire:loading  wire:target="avatar"
                                    class="bg-neutral-secondary-soft border-default text-fg-brand-strong rounded-base flex h-[200px] w-[200px] items-center justify-center border text-xs font-medium">
                                    <div
                                        class="ring-brand-subtle text-fg-brand-strong bg-brand-softer animate-pulse rounded-sm px-2 py-px text-xs font-medium ring-1 ring-inset">
                                        loading...</div>
                                </div>
                        @if ($avatar)
                                <div class="">
                                    <img class="h-[200px] w-[200px] object-cover" src="{{ $avatar->temporaryUrl() }}"
                                        alt="">
                                </div>
                                @endif
                        </div>
                        @error('avatar')
                            <p class="text-fg-danger-strong mt-2.5 text-sm text-red-500">{{ $message }}</p>
                        @enderror

                    </div>
                    <button class="bg-green-300"> <svg wire:loading wire:target="createUser" aria-hidden="true"
                            class="text-neutral-quaternary fill-brand h-8 w-8 animate-spin" viewBox="0 0 100 101"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="currentColor" />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentFill" />
                        </svg> kirim</button>
        </form>

    </div>
    <div class="">
        <h1>Daftar Users</h1>
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Avatar</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="bg-red-200"><img src="{{ $user->avatar }}" alt="Avatar" class="h-[200px] w-[200px] rounded-full"></td>
                </tr>
                {{-- {{ dd($user->avatar) }} --}}
            @endforeach
        </table>
        {{ $users->links() }}
    </div>




    users berjumlah : {{ $users->count() }}
    <button wire:click="createUser">tambah users</button>
    <hr class="border-2 border-green-400">

    <ul>

        @foreach ($users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ul>
</div>

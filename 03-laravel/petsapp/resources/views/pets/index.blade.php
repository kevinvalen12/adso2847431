@extends('layouts.app')
@section('title', 'Pets')

@section('content')
@include('layouts.navbar')

<h1 class="text-3xl pt-30 flex gap-2 items-center text-white font-bold mb-10 pb-2 border-b-2">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-12">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
    </svg>
    Pets Module
</h1>

<ul class="menu gap-1 mb-8 menu-horizontal bg-base-200 rounded-box">
  <li>
    <a href="{{ url('pets/create') }}" class="btn btn-sm sm:btn-md btn-success btn-outline">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
        Add Pet
    </a>
  </li>
  <li><a class="btn btn-sm sm:btn-md btn-neutral btn-outline">Export PDF</a></li>
  <li><a class="btn btn-sm sm:btn-md btn-neutral btn-outline">Export Excel</a></li>
</ul>

<div class="overflow-x-auto my-2 rounded-box bg-base-100">
  <table class="table table-zebra">
    <thead>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th class="sm:table-cell hidden">Kind</th>
        <th class="md:table-cell hidden">Weight</th>
        <th>Breed</th>
        <th>Location</th>
        <th>Description</th>
        <th>Age</th>
        <th>Created</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($pets as $pet)
      <tr class="hover:bg-base-300">
        <td>
          <div class="avatar">
            <div class="mask mask-squircle h-12 w-12">
              <img src="{{ asset('images/'.$pet->image) }}" alt="Pet image" />
            </div>
          </div>
        </td>
        <td class="font-bold">{{ $pet->name }}</td>
        <td class="sm:table-cell hidden">
          <span class="badge badge-outline badge-neutral">{{ $pet->kind }}</span>
        </td>
        <td class="md:table-cell hidden">{{ $pet->weight }} kg</td>
        <td>{{ $pet->breed }}</td>
        <td>{{ $pet->location }}</td>
        <td>{{ $pet->description }}</td>
        <td>{{ $pet->age }} years</td>
        <td>{{ $pet->created_at->diffForHumans() }}</td>
        <td class="flex gap-1">
          <a class="btn btn-outline btn-square btn-neutral btn-xs" href="{{ url('pets/'.$pet->id) }}">
            <!-- View -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
              <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197M16.803 15.803A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 11.607 10.607Z" />
            </svg>
          </a>
          <a class="btn btn-outline btn-square btn-neutral btn-xs" href="{{ url('pets/'.$pet->id.'/edit') }}">
            <!-- Edit -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
              <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z" />
            </svg>
          </a>
          <a class="btn btn-outline btn-square btn-error btn-xs">
              <!-- Delete -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 6 6h12l0 12M3 6h18M9 6v12m6-12v12" />
            </svg>
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th></th>
        <th>Name</th>
        <th class="sm:table-cell hidden">Kind</th>
        <th class="md:table-cell hidden">Weight</th>
        <th>Breed</th>
        <th>Location</th>
        <th>Description</th>
        <th>Age</th>
        <th>Created</th>
        <th>Actions</th>
      </tr>
    </tfoot>
  </table>
</div>

{{ $pets->links('layouts.paginator') }}

<dialog id="messaggeModal" class="modal">
  <div class="modal-box">
    <form method="dialog">
      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
    </form>
    <h3 class="text-lg font-bold">Message</h3>
    <p class="py-4" id="text-mensagge">Lorem Ipsum Dolor</p>
  </div>
</dialog>

@endsection

@section('js')
<script>
  const messaggeModal = document.querySelector('#messaggeModal');
  const textMensagge = document.querySelector('#text-mensagge');

  @if (session('messagge'))
    textMensagge.textContent = "{{ session('messagge') }}";
    messaggeModal.showModal();
  @endif
</script>
@endsection

@extends('layouts.app')
@section('title', 'Pets Module')

@section('content')
@include('layouts.navbar')
<!-- Authentication -->
<h1 class="text 3xl pt-30 flex gap-2 items-center text-white font-bold mb-10 pb-2 border-b-2">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-12">
      <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
    </svg>
    Pets Module
</h1>
<ul class="menu gap-1 mb-8 sm:menu-horizontal bg-base-200 rounded-box">
    <li>
        <a href="{{ url('pets/create') }}" class="btn btn-sm btn- sm:btn-md btn-success btn-outline">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            Add pet
        </a>
    </li>
    <li><a href="" class="btn btn-error btn-outline">Export PDF</a></li>
    <li><a href="" class="btn btn-info btn-outline">Export Excel</a></li>
    <li><input type="search" id="qsearch" name="qsearch" class="py-2" placeholder="Search..."></li>

</ul>
<div class="overflow-x-auto my-2 rounded-box bg-base-100">
  <table class="table">
    <!-- head -->
    <thead>
      <tr>
        <th>Name</th>
        <th class="md:table-cell hidden ">Kind</th>
        <th class="sm:table-cell hidden ">Age</th>
        <th class="sm:table-cell hidden ">Breed</th>
        <th class="sm:table-cell hidden ">Weight</th>
        <th class="sm:table-cell hidden ">Location</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="list">
      <!-- row 1 -->
      @foreach ($pets as $pet)
      <tr>
        <td>
          <div class="flex items-center gap-3">
            <div class="avatar">
              <div class="mask mask-squircle h-12 w-12">
                <img
                  src="{{ asset('images/'.$pet->image) }}"
                  alt="Image" />
              </div>
            </div>
            <div>
              <div class="font-bold">{{ $pet->name }}</div>
              <div class="text-sm opacity-65">
                <span class="badge {{ $pet->status == 1 ? 'badge-success' : 'badge-error' }}">
                  {{ $pet->status == 1 ? 'Adopted' : 'Not adopted' }}
                </span>
              </div>
            </div>
          </div>
        </td>

        <td>
          <br />
          <span class=" badge badge-outline badge-neutral">{{ $pet->kind }}</span>
        </td>
        <td class="sm:table-cell hidden">{{ $pet->age }}</td>
        <td class="sm:table-cell hidden">{{ $pet->breed }}</td>
        <td class="sm:table-cell hidden">{{ $pet->weight }}</td>
        <td class="sm:table-cell hidden">{{ $pet->location }}</td>

        <th>
        <a class="btn btn-outline btn-square btn-neutral btn-xs" href="{{ url('pets/'.$pet->id) }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>

        </a>
                <a class="btn btn-outline btn-square btn-neutral btn-xs" href="{{ url('pets/'.$pet->id.'/edit') }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
            </svg>

        </a>

        <a href="javascript:;" class="btn btn-outline btn-square btn-error btn-xs btn-delete" data-fullname="{{$pet->name}}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
            </svg>
        </a>
        <form method="POST" action="{{ url('pets/' . $pet->id) }}" >
        @csrf
        @method('delete')
        </form>
        </th>
    </tr>
@endforeach
    </tbody>
    <!-- foot -->
    <tfoot>
      <tr>
        <th>Name</th>
        <th class="sm:table-cell hidden ">Kind</th>
        <th class="md:table-cell hidden ">Age</th>
        <th class="md:table-cell hidden ">Breed</th>
        <th class="md:table-cell hidden ">Weight</th>
        <th class="md:table-cell hidden ">Location</th>
        <th>Actions</th>
      </tr>
    </tfoot>
  </table>

</div>

{{ $pets->links('layouts.paginator') }}

<dialog id="messageModal" class="modal">
  <div class="modal-box">
    <form method="dialog">
      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
    </form>
    <h3 class="text-lg font-bold">Congratulations!</h3>
    <p class="py-4" id="text-mensagge">Lorem ipsum dolor</p>
  </div>
</dialog>

<dialog id="confirm" class="modal">
  <div class="modal-box">
    <form method="dialog">
      <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
    </form>
    <h3 class="text-lg font-bold">Are you Sure!</h3>
    <p class="py-4" id="text-confirm">Lorem ipsum dolor</p>
    <div class="flex gap-2">
      <form method="dialog">
        <button class="btn btn-sm">Cancel</button>
      </form>
        <button class="btn btn-sm btn-error btn-accept">Accept</button>

    </div>
  </div>
</dialog>

@endsection
@section('js')
  <script>
     const messageModal = document.querySelector('#messageModal');
    const textMensagge = document.querySelector('#text-mensagge');
    @if (session('message'))
    textMensagge.textContent = "{{session('message')}}"
    messageModal.showModal()
    @endif

    const btnDelete = document.querySelectorAll('.btn-delete');
    const confirm = document.querySelector('#confirm');
    const textConfirm = document.querySelector('#text-confirm');
    const btnAccept = document.querySelector('.btn-accept');
    let frmDelete = undefined;


    btnDelete.forEach(element => {
    element.addEventListener('click', function () {
      const name = this.dataset.name;
      frmDelete = this.nextElementSibling;
      textConfirm.textContent = ` Are you sure you want to delete the pet ${name}?`;
      confirm.showModal();
    });
    });

    btnAccept.addEventListener('click', function () {
    frmDelete.submit();
    });
    //search
    const qSearch = document.querySelector('#qsearch')
    const list = document.querySelector('#list')

    qSearch.addEventListener('keyup', function (event) {
    event.preventDefault()
    let query = this.value
    let token = document.querySelector('input[name=_token]')

    fetch('pets/search', {
      method: 'POST',
      headers: {
      'Content-Type': 'application/json',
      'Accept': 'application/json',
      'X-CSRF-TOKEN': token.value
      },
      body: JSON.stringify({
      'q': query
      })
    }).then(response => response.text())
      .then(data => {
      list.innerHTML  = `<tr>
        <td colspan="4">
        <span class="loading loading-spinner loading-md flex mx-auto"></span>
        </td>
        </tr>`
      setTimeout(() => {
        list.innerHTML  = data
      }, 2000);
      })
    })
  </script>
@endsection

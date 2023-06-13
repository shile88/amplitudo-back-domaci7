<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-around ">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Show my contacts
            </h2>
            <div>
                <a href="{{route('contacts.create')}}" class="btn btn-success mr-3">Add contact</a>
                <a href="" class="btn btn-info ">Export to excel</a>
            </div>
        </div>

    </x-slot>

    <div class="offset-3 col-6 mt-5">
        @if(count($contacts) == 0)
            <div class="mt-5 container">
                <div class="row">
                    <div class="offset-4 col-6">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title fs-3 fw-bold text-center">Your contact list is empty</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <table class="table text-center align-middle table-bordered">
                <thead >
                <th>Name</th>
                <th>Last Name</th>
                <th>Email</th>
                </thead>
                <tbody class="table-group-divider">

                @foreach($contacts as $contact)
                    <tr>
                        <td @if($contact->avatar) class="d-flex align-items-center" @endif>

                            @if($contact->avatar)
                                <img src="{{asset($contact->avatar)}}" class="rounded-circle mr-3"
                                     style="width: 50px;" alt="Avatar" />
                            @endif

                            {{$contact->first_name}}</td>
                        <td>{{$contact->last_name}}</td>
                        <td>{{$contact->email}}</td>
                    </tr>
                @endforeach
                @endif
                </tbody>
            </table>

            {{$contacts->links()}}
    </div>
</x-app-layout>

@extends('frontend.pages.master')

@section('section')
    <div class="row g-4">



        <div class="row">
            @foreach ($books as $book)
                <div class="col-md-6">
                    <div class="card mb-3 ">
                        <div class="card-header">

                            <div class="card-body">
                                <img style="width: 400px;
                                height:260px;"
                                    src="{{ url('/uploads/categories' . $book->category->image) }}" alt="image">
                                <p class="mt-3 mb-3"><span>Category Name:</span>{{ $book->category->name }}</p>
                                <p><span>Floor Number:</span>{{ $book->room->floor_number }}</p>
                                <p><span>Room Number:</span>{{ $book->room->room_number }}</p>
                                <p><span>Descriptins:</span>{{ $book->amenitie->description }}</p>

                                <button class="btn btn-outline-success">Booking Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </div>
@endsection

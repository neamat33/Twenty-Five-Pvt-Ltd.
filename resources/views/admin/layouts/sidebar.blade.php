<div class="sidebar px-4 py-4 py-md-4 me-0 gradient">
    <div class="d-flex flex-column h-100">
        <a href="{{ route('admin.dashboard') }}" class="mb-0 brand-icon">
            <span>Admin Panel</span>
            {{-- <span><img src="{{ asset('images/logo/logo.png') }}" alt=""></span> --}}
        </a>
        <!-- Menu: main ul -->
        <ul class="menu-list flex-grow-1 mt-3">
            <li><a class="m-link active" href="{{ route('admin.dashboard') }}"><i class="icofont-home fs-5"></i> <span>Dashboard</span></a></li>
            <li><a class="m-link" href="{{ route('contacts.index') }}"><i class="icofont-sale-discount fs-5"></i> <span>Contacts</span></a></li>
            {{-- <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#slider-list" href="#">
                <i class="icofont-sale-discount fs-5"></i> <span> Books</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sub menu ul -->
                <ul class="sub-menu collapse" id="slider-list">
                    <li><a class="ms-link" href="{{ route('books.create') }}"><span class="fa fa-plus"></span>Add Book</a></li>
                    <li><a class="ms-link" href="{{ route('books.index') }}"><span class="fa fa-eye"></span>Book List</a></li>
                    <li><a class="ms-link" href="{{ route('categories.index') }}"><span class="fa fa-eye"></span>Book Category</a></li>
                </ul>
            </li> --}}

        </ul>
        <!-- Menu: menu collepce btn -->
        <button type="button" class="btn btn-link sidebar-mini-btn text-light">
            <span class="ms-2"><i class="icofont-bubble-right"></i></span>
        </button>
    </div>
</div>

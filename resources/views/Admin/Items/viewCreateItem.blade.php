@include('Admin/layouts/header')
@include('Admin/layouts/mainheader')
@include('Admin/layouts/leftsidebar')
    @include('Admin/layouts/mainContainerTop')
        @include('Admin/layouts/Items/viewCreateItem')
        @include('Admin/layouts/Items/dropZoneScripts')
    @include('Admin/layouts/mainContainerBottom')
@include('Admin/layouts/footer')

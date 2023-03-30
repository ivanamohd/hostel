@if(session()->has('message'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show"
    class="container position-sticky z-index-sticky top-0" style="width: 400px;">
    <div class="row">
        <div class="col-12">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4 navbar-nav mx-auto"
                style="background:rgba(238,225,198, 0.5)">
                <div class="container-fluid">
                    <span style="margin:auto" class="text-white">
                        {{session('message')}}
                    </span>
                </div>
            </nav>
        </div>
    </div>
</div>
@endif
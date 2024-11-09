<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Tambahkan ini di head atau di bagian bawah file layout Anda -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <!-- Tambahkan ini di head atau di bagian bawah file layout Anda -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <style>
        /* Sidebar styling */
        #sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #1e3d59;
            color: #fff;
            padding-top: 20px;
            z-index: 1000;
            transition: all 0.3s;
        }
        #sidebar .nav-link {
            color: #cdd3d8;
            font-size: 16px;
            padding: 15px 20px;
            display: flex;
            align-items: center;
        }
        #sidebar .nav-link .fa {
            margin-right: 10px;
            font-size: 18px;
        }
        #sidebar .nav-link.active, #sidebar .nav-link:hover {
            background-color: #0b2638;
            color: #fff;
        }
        /* Content area */
        #contents {
            margin-left: 250px;
            padding: 20px;
            background-color: #f8f9fa;
            min-height: 100vh;
            transition: margin-left 0.3s;
        }
        /* Sidebar toggle button for mobile */
        #sidebarToggle {
            display: none;
        }

        @media (max-width: 768px) {
            #sidebar {
                left: -250px;
            }
            #sidebar.active {
                left: 0;
            }
            #contents {
                margin-left: 0;
            }
            #contents.active {
                margin-left: 250px;
            }
            #sidebarToggle {
                display: block;
                position: fixed;
                top: 10px;
                left: 10px;
                z-index: 1100;
                font-size: 24px;
                color: #1e3d59;
                background-color: #fff;
                border: none;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar Toggle Button (visible on mobile) -->
    <button id="sidebarToggle" class="btn">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Sidebar -->
    <div id="sidebar">
        <h4 class="text-center mt-3">Admin Panel</h4>
        <nav class="nav flex-column mt-4">
            <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="fa fa-tachometer-alt"></i> Dashboard
            </a>
            <a class="nav-link {{ request()->is('categories*') ? 'active' : '' }}" href="{{ route('categories.index') }}">
                <i class="fa fa-tags"></i> Categories
            </a>
            <a class="nav-link {{ request()->is('tags*') ? 'active' : '' }}" href="{{ route('tags.index') }}">
                <i class="fa fa-tag"></i> Tags
            </a>
            <a class="nav-link {{ request()->is('posts*') ? 'active' : '' }}" href="{{ route('posts.index') }}">
                <i class="fa fa-pencil"></i> Posts
            </a>
            <a class="nav-link {{ request()->is('comments*') ? 'active' : '' }}" href="{{ route('admin.comments.index') }}">
                <i class="fa fa-comments"></i> Comments
            </a>
            <a class="nav-link {{ request()->is('pages*') ? 'active' : '' }}" href="{{ route('pages.index') }}">
                <i class="fa fa-file"></i> Pages
            </a>
            <a class="nav-link" href="{{ route('logout') }}">
                <i class="fa fa-sign-out-alt"></i> Logout
            </a>
        </nav>
    </div>

    <!-- Main Content -->
    <div id="contents">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script>
        // Toggle sidebar visibility on mobile
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('contents').classList.toggle('active');
        });
    </script>
     @yield('script')
</body>
</html>

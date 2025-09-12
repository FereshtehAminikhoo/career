<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سامانه استخدامی | @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Vazirmatn:wght@100..900&display=swap');
        
        body {
            font-family: 'Vazirmatn', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        .job-card {
            background: white;
            border: 1px solid #e5e7eb;
            transition: all 0.2s ease;
        }
        
        .job-card:hover {
            border-color: #6366f1;
        }
        .pagination-circle {
            width: 2.5rem;
            height: 2.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 9999px;
        }
        
        footer {
            margin-top: auto;
        }

        .expired-tag {
            position: absolute;
            top: 10px;
            left: 10px;
            background: #ef4444;
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 500;
        }
    </style>
</head>
<body class="bg-gray-50">
    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')

    <script>
        // File upload name display
        document.getElementById('resume')?.addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name || 'هیچ فایلی انتخاب نشده است';
            document.getElementById('file-name').textContent = fileName;
        });

        // Navigation between sections
        // const sections = ['jobs', 'job-detail', 'post-job', 'admin'];
        // document.querySelectorAll('nav a').forEach(link => {
        //     link.addEventListener('click', function(e) {
        //         e.preventDefault();
        //         const target = this.getAttribute('href').substring(1);
        //         showSection(target);
        //     });
        // });

        // Show apply form
        document.getElementById('apply-button')?.addEventListener('click', function() {
            document.getElementById('apply-form').classList.remove('hidden');
        });

        // Cancel apply
        document.getElementById('cancel-apply')?.addEventListener('click', function() {
            document.getElementById('apply-form').classList.add('hidden');
        });

        // Back to applications list
        document.getElementById('back-to-applications')?.addEventListener('click', function() {
            document.getElementById('admin-applications').classList.remove('hidden');
            document.getElementById('admin-application-detail').classList.add('hidden');
        });

        // Show section function
        // function showSection(sectionId) {
        //     sections.forEach(id => {
        //         const element = document.getElementById(id);
        //         if (element) {
        //             if (id === sectionId) {
        //                 element.classList.remove('hidden');
        //             } else {
        //                 element.classList.add('hidden');
        //             }
        //         }
        //     });
        // }

        // Initialize - show jobs section by default
        // showSection('jobs');
    </script>
</body>
</html>
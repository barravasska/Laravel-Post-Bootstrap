<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Laravel CRUD Learning</title> 
    <!-- Bootstrap CSS for styling --> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0
alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <style> 
        body { 
            padding-top: 20px; 
            padding-bottom: 20px; 
        } 
        .header { 
            margin-bottom: 2rem; 
        } 
        .post-card { 
            margin-bottom: 1rem; 
        } 
        .alert { 
            margin-top: 1rem; 
        } 
    </style> 
</head> 
<body> 
    <div class="container"> 
        <header class="header"> 
            <h1 class="text-center">Laravel CRUD Learning</h1> 
            <p class="text-center text-muted">A simple CRUD application for learning 
Laravel environment</p>
 </header> 
 
        <main> 
            <!-- Display success/error messages if they exist --> 
            @if(session('success')) 
                <div class="alert alert-success"> 
                    {{ session('success') }} 
                </div> 
            @endif 
 
            @yield('content') 
        </main> 
 
        <footer class="footer mt-5 py-3 border-top"> 
            <div class="container text-center text-muted"> 
                <p>Laravel CRUD Learning Application - For Educational Purposes</p> 
            </div> 
        </footer> 
    </div> 
 
    <!-- Bootstrap JS --> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0
alpha1/dist/js/bootstrap.bundle.min.js"></script> 
</body> 
</html> 
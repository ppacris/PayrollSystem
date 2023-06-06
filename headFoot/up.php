<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Payroll System</title>
    <link rel="stylesheet" href="../assets/lib/bootstrapV5.2/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/lib/dataTables/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="../assets/style/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="../home/">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="30" height="30">
                    <path d="M2 2.75C2 1.784 2.784 1 3.75 1h2.5a.75.75 0 0 1 0 1.5h-2.5a.25.25 0 0 0-.25.25v10.5c0 .138.112.25.25.25h2.5a.75.75 0 0 1 0 1.5h-2.5A1.75 1.75 0 0 1 2 13.25Zm6.56 4.5h5.69a.75.75 0 0 1 0 1.5H8.56l1.97 1.97a.749.749 0 0 1-.326 1.275.749.749 0 0 1-.734-.215L6.22 8.53a.75.75 0 0 1 0-1.06l3.25-3.25a.749.749 0 0 1 1.275.326.749.749 0 0 1-.215.734Z"></path>
                </svg>
            </a>
            <ul class="navbar-nav navbar-brand">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <b>Employee</b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../empAdd/">Add</a></li>
                        <li><a class="dropdown-item" href="../empUpload/">Upload files</a></li>
                        <li><a class="dropdown-item" href="../empView/">View</a></li>
                    </ul>
                </li>
                <li class="nav-link text-white">|</li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#"><b>Payroll Process</b></a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">

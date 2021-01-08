@include('lime.includes.header')
@section('limeheader')
@endsection

<div class="lime-container">
    <div class="lime-body">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-separator-1">
                                <li class="breadcrumb-item"><a href="#">Menu</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Todo</li>
                            </ol>
                        </nav>
                        <h3>Todo</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="todo-sidebar">
                                        <div class="todo-new-task">
                                            <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#newTask">Create New Task</button>
                                            <div class="modal fade" id="newTask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">New Task</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <i class="material-icons">close</i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" id="new-task-name" placeholder="Task Name">
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <button type="button" class="btn btn-primary">Add</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="todo-menu">
                                            <h3>Filters</h3>
                                            <ul class="list-unstyled">
                                                <li class="active"><a href="#"><i class="fas fa-bars"></i>All</a></li>
                                                <li><a href="#"><i class="fas fa-check"></i>Completed</a></li>
                                                <li><a href="#"><i class="fas fa-trash"></i>Deleted</a></li>
                                            </ul>
                                        </div>
                                        <div class="divider"></div>
                                        <div class="todo-search m-b-lg">
                                            <form>
                                                <div class="input-group">
                                                    <input type="text" id="todo-search" class="form-control" placeholder="Search task">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="todo-list">
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="#" class="custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="task1">
                                                    <label class="custom-control-label" for="task1"></label>
                                                    Go to shop
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="task2">
                                                    <label class="custom-control-label" for="task2"></label>
                                                    Finish java assignment
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="task3">
                                                    <label class="custom-control-label" for="task3"></label>
                                                    Send e-mail to Dr. Collins
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="task4">
                                                    <label class="custom-control-label" for="task4"></label>
                                                    Delete all folders in ../assets/plugins
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="task5">
                                                    <label class="custom-control-label" for="task5"></label>
                                                    Sell iPad Mini
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="task6">
                                                    <label class="custom-control-label" for="task6"></label>
                                                    Create new Amazon account
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="task7">
                                                    <label class="custom-control-label" for="task7"></label>
                                                    Check new codes from section #7 student assignments
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="lime-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <span class="footer-text">2021 © Black Phoenix</span>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Javascripts -->
<script src="lime/assets/assets/plugins/jquery/jquery-3.1.0.min.js"></script>
<script src=".lime/assets/assets/plugins/bootstrap/popper.min.js"></script>
<script src="lime/assets/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="lime/assets/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="lime/assets/assets/js/lime.min.js"></script>
<script src="lime/assets/assets/js/pages/todo.js"></script>
</body>
</html>

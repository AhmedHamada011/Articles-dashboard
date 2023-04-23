<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/sidebar.php') ?>
<?php require base_path('views/partials/banner.php') ?>

    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">groups</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item">Groups</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
        <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="d-flex justify-content-end">
                <form class="search-form col-4" action="/groups">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-success"><i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <a class="btn btn-dark" href="/groups/create"><i class="fas fa-plus-circle text-light"></i></a> 
            </div>
        <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Icon</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach($groups as $group){ ?>
                        <tr>
                            <td><?=$group["id"]?></td>
                            <td><a href="/group?id=<?=$group["id"]?>"><?=$group["name"]?></a></td>
                            <td><?=$group["description"]?></td>
                            <td><i class="fa <?=$group["icon"]?>"></i></td>
                            <td>
                                <a class="btn" href="group/edit?id=<?=$group["id"]?>"  class='nav-link active'><i class="fas fa-edit"></i></a>
                            </td>
                            <td>
                                <form action="group?id=<?=$group["id"]?>" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="id" value="<?= $group['id'] ?>">
                                <button class="btn" id="btnDelete" onclick="modalShow(event)" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-trash-alt"></i></button> 
                                </form>
                            </td>
                        </tr>
                        <?php }?>

                    </tbody>
                </table>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<div class="modal fade" id="exampleModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">delete group</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this group?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-success" data-dismiss="modal" id="modalNo">no</button>
                <button type="button" class="btn btn-danger" id="modalYes">yes</button>
            </div>
        </div>
    </div>
</div>
<?php if(isset($_SESSION["_flash"]["delete_group"])){?>
    <div id="toastsContainerTopRight" class="toasts-top-right fixed w-25">
        <div class="toast bg-dark fade show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header"><strong class="mr-auto">Info</strong>
        </div>
        <div class="toast-body"> 
            <?=$_SESSION["_flash"]["delete_group"]["error"]??$_SESSION["_flash"]["delete_group"]["success"]?>
        </div>
        </div>
    </div>
<?php } ?>
<?php require base_path('views/partials/footer.php') ?>
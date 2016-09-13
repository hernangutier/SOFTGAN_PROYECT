
<?php
  use yii\helpers\Url;
 ?>

<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/avatar5.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [


                    //----------- Registros y Procesos -----
                    //------------------- Tablas Refersciales ----------------------

                    [
                                'label' =>'Registros',
                                'icon' => 'glyphicon glyphicon-th-large',
                                'url' => '#',
                                'items' => [


                                            ['label' => 'Bovinos (Activos)', 'icon' => 'fa fa-circle-o', 'url' => ['bovinos/index'],],
                                            ['label' => 'Bovinos (Situacion Descarte)', 'icon' => 'fa fa-circle-o', 'url' => ['bovinos/index-for-descarte'],],
                                            ['label' => 'Bovinos (Desicorporados)', 'icon' => 'fa fa-circle-o', 'url' => ['desincorporaciones/index'],],
                                            ['label' => 'Ventas Lotes', 'icon' => 'fa fa-circle-o', 'url' => ['ventas-lotes/index'],],

                                            ['label' => 'Toma de Pesos Vivos', 'icon' => 'fa fa-circle-o', 'url' => ['bovinos/tomapesos'],],
                                            ['label' => 'Registrar Servicio (Hembras)', 'icon' => 'fa fa-circle-o', 'url' => ['bovinos/tomapesos'],],






                                    ],
                            ],









                    //------------------- Tablas Refersciales ----------------------
                    [
                        'label' => 'Valores Referenciales',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            [
                                'label' =>'Servicios',
                                'icon' => 'fa fa-circle-o',
                                'url' => '#',
                                'items' => [


                                            ['label' => 'Parametros de Pesaje', 'icon' => 'fa fa-circle-o', 'url' => ['pesaje-values/index'],],
                                            ['label' => 'Causas', 'icon' => 'fa fa-circle-o', 'url' => '#'],
                                            ['label' => 'Determinación Preñez', 'icon' => 'fa fa-circle-o', 'url' => ['intervalos-prenez/index']],
                                            ['label' => 'Veterinarios', 'icon' => 'fa fa-circle-o', 'url' => ['veterinarios/index']],


                                    ],
                            ],
                            //------------ Descartes -------------------
                            [
                                'label' =>'Desincorporaciones',
                                'icon' => 'fa fa-circle-o',
                                'url' => '#',
                                'items' => [


                                            ['label' => 'Conceptos', 'icon' => 'fa fa-circle-o', 'url' => ['conceptos-out/index'],],
                                            ['label' => 'Clientes', 'icon' => 'fa fa-circle-o', 'url' => ['clientes/index'],],
                                            //['label' => 'Causas', 'icon' => 'fa fa-circle-o', 'url' => ['status-causas/index'],],


                                    ],
                            ],

                            [
                                'label' => 'Bovinos',
                                'icon' => 'fa fa-circle-o',
                                'url' => '#',
                                'items' => [


                                            ['label' => 'Rebaños', 'icon' => 'fa fa-circle-o', 'url' => ['bovinos-rebanos/index'],],
                                            ['label' => 'Razas', 'icon' => 'fa fa-circle-o', 'url' => ['bovinos-razas/index'],],
                                            ['label' => 'Categorias', 'icon' => 'fa fa-circle-o', 'url' => ['bovinos-categoria/index'],],
                                            ['label' => 'Toros Grupos', 'icon' => 'fa fa-circle-o', 'url' => ['grupos-toros/index'],],
                                            ['label' => 'Colores', 'icon' => 'fa fa-circle-o', 'url' => ['bovinos-colores/index'],],

                                    ],
                                ],
                            ],
                    ],

                    //----------- Registros y Procesos -----
                    //------------------- Tablas Refersciales ----------------------

                    [
                                'label' =>'Reproduccion',
                                'icon' => 'fa  fa-venus-mars',
                                'url' => '#',
                                'items' => [
                                            ['label' => 'Hembras Reproductoras', 'icon' => 'fa  fa-venus text-red', 'url' => ['bovinos/index-madres'],],
                                            ['label' => 'Machos Reproductores', 'icon' => 'fa  fa-mars text-blue', 'url' => ['bovinos/index-madres'],],




                                    ],
                            ],

                            [
                                        'label' =>'Reportes',
                                        'icon' => 'glyphicon glyphicon-book',
                                        'url' => '#',
                                        'items' => [


                                                    ['label' => 'Inv. y Observaciones', 'icon' => 'glyphicon glyphicon-list-alt', 'url' => Url::base() . '/report/toma-inventario.php',],
                                                    ['label' => 'Inv. Gen. Activo', 'icon' => 'glyphicon glyphicon-list-alt', 'url' => Url::base() . '/report/inv-general.php',],
                                                    ['label' => 'Inv. X Categoria (Activo)', 'icon' => 'glyphicon glyphicon-list-alt', 'url' => ['consultas/inventario_categorias','title'=>'Inventario Activo Por Categoria']],
                                                    ['label' => 'Inv. General a Descartar', 'icon' => 'glyphicon glyphicon-list-alt', 'url' => Url::base().'/report/inv-general-descartar.php',],
                                                    ['label' => 'Inv. X Categoria (Descarte)', 'icon' => 'glyphicon glyphicon-list-alt', 'url' => ['consultas/inventario_categorias_descarte','title'=>'Inventario Activo en Descarte Por Categoria']],

                                                    [
                                                        'label' =>'Reproducción',
                                                        'icon' => 'fa fa-circle-o',
                                                        'url' => '#',
                                                        'items' => [


                                                        ['label' => 'Preñadas', 'icon' => 'fa fa-circle-o', 'url' => Url::base().'/report/prenadas.php',],
                                                                    ['label' => 'Vacias', 'icon' => 'fa fa-circle-o', 'url' => Url::base().'/report/vacias.php',],
                                                                    ['label' => 'Hoja Resumen', 'icon' => 'fa fa-circle-o', 'url' =>'#' ],



                                                            ],
                                                    ],


                                            ],
                                    ],

                ],

            ]
        ) ?>

    </section>

</aside>

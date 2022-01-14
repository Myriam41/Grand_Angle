<?php
    @session_start();
    $title = "Accueil";
    $titlePage = "accueil";

    $_SESSION['expoID'] = getLastExpo();

    ob_start();
    
?>
    <main>
        <h1>Dashboard</h1>
                <div class="date">
                    <input type="date">
                </div>

                <div class="insights">
                    <div class="sales">
                        <span class="material-icons-sharp">analytics</span>
                        <div class="middle">
                            <div class="left">
                                <h3>Total Sales</h3>
                                <h1>$25,024</h1>
                            </div>
                            <div class="progress">
                                <svg>
                                    <circle cx='38' cy='38' r='36'></circle>
                                </svg>
                                <div class="number">
                                    <p>81%</p>
                                </div>
                            </div>
                        </div>
                        <small class="text-muted">Last 24 hours</small>
                    </div>
                    <!-- FIN SALES-->
                    <div class="expenses">
                        <span class="material-icons-sharp">bar_chart</span>
                        <div class="middle">
                            <div class="left">
                                <h3>Total Sales</h3>
                                <h1>$14,160</h1>
                            </div>
                            <div class="progress">
                                <svg>
                                    <circle cx='38' cy='38' r='36'></circle>
                                </svg>
                                <div class="number">
                                    <p>62%</p>
                                </div>
                            </div>
                        </div>
                        <small class="text-muted">Last 24 hours</small>
                    </div>
                    <!-- FIN EXPENSES-->
                    <div class="income">
                        <span class="material-icons-sharp">stacked_line_chart</span>
                        <div class="middle">
                            <div class="left">
                                <h3>Total Expenses</h3>
                                <h1>$10,864</h1>
                            </div>
                            <div class="progress">
                                <svg>
                                    <circle cx='38' cy='38' r='36'></circle>
                                </svg>
                                <div class="number">
                                    <p>44%</p>
                                </div>
                            </div>
                        </div>
                        <small class="text-muted">Last 24 hours</small>
                    </div>
                    <!-- FIN INCOMES-->
                </div>

                <div class="recent-orders">
                    <h2>Les 5 oeuvres les plus vues</h2>
                    <div id="artGraph">
                        <canvas id="graph" width="400" height="200"></canvas>
                    </div>
                </div>
                </main>
                 <!-- FIN DU MAIN -->
            <div class="right">
                <div class="top">
                    <button id="menu-btn">
                        <span class="material-icons-sharp">menu</span>
                    </button>
                    <div class="theme-toggler">
                        <span class="material-icons-sharp active">light_mode</span>
                        <span class="material-icons-sharp">dark_mode</span>
                    </div>
                    <div class="profile">
                        <div class="info">
                            <p>Bonjour, <b>Mathieu</b></p>
                            <small class="text-muted">Admin</small>
                        </div>
                        <div class="profile-photo">
                            <img src="img/261746878_453672526326290_2022088434576343659_n.jpg" alt="user_picture">
                        </div>
                    </div>
                </div>
                <!-- FIN DU TOP -->
                <div class="recent-updates">
                    <h2>Recent Updates</h2>
                    <div class="updates">
                        <div class="update">
                            <div class="profile-photo">
                                <img src="#" alt="#">
                            </div>
                            <div class="message">
                                <p><b>Myriam Stampers</b> a bien reçu sa commande</p>
                                <small class="text-muted">Il y a 2 minutes</small>
                            </div>
                        </div>
                        <div class="update">
                            <div class="profile-photo">
                                <img src="#" alt="#">
                            </div>
                            <div class="message">
                                <p><b>Myriam Stampers</b> a bien reçu sa commande</p>
                                <small class="text-muted">Il y a 2 minutes</small>
                            </div>
                        </div>
                        <div class="update">
                            <div class="profile-photo">
                                <img src="#" alt="#">
                            </div>
                            <div class="message">
                                <p><b>Myriam Stampers</b> a bien reçu sa commande</p>
                                <small class="text-muted">Il y a 2 minutes</small>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIN MAJ RECENTES -->
                <div class="sales-analytics">
                    <h2>Sales Analytics</h2>
                    <div class="item online">
                        <div class="icon">
                            <span class="material-icons-sharp">shopping_cart</span>
                        </div>
                        <div class="right">
                            <div class="info">
                                <h3>Online Orders</h3>
                                <small class="text-muted">Last 24 hours</small>
                            </div>
                            <h5 class="success">+39%</h5>
                            <h3>3849</h3>
                        </div>
                    </div>
                    <div class="item offline">
                        <div class="icon">
                            <span class="material-icons-sharp">local_mall</span>
                        </div>
                        <div class="right">
                            <div class="info">
                                <h3>Offline Orders</h3>
                                <small class="text-muted">Last 24 hours</small>
                            </div>
                            <h5 class="danger">-17%</h5>
                            <h3>1100</h3>
                        </div>
                    </div>
                    <div class="item customers">
                        <div class="icon">
                            <span class="material-icons-sharp">person</span>
                        </div>
                        <div class="right">
                            <div class="info">
                                <h3>Nouveaux Clients</h3>
                                <small class="text-muted">Last 24 hours</small>
                            </div>
                            <h5 class="success">+25%</h5>
                            <h3>849</h3>
                        </div>
                    </div>
                    <div class="item add-product">
                        <div>
                            <span class="material-icons-sharp">add</span>
                            <h3>Add products</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    $contentMAin = ob_get_clean();

    require('private/view/template/base.php');

    // JS pour affichage du graph
?> 
    <script src="private/assets/js/stats.js"></script>

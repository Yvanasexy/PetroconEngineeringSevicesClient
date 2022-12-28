<main class="content">
    <!-- Header -->
    <div class="page-header">
        <div class="project-info">
            <div>
                <h1 class="page-title"><?= $data['name'] ?></h1>
                <small><?= $data['location'] ?></small>
            </div>
        </div>
        <button type="button" class="btn icon-btn align-self-start" data-toggle="slide" data-target="#projectInfo">
            <span class="material-icons-outlined">info</span>
        </button>
    </div>

    <!-- Project Info -->
    <div class="slide slide-fixed" id="projectInfo" data-side="right">
        <div class="slide-content">
            <div class="slide-header">
                <button class="btn icon-btn" data-dismiss="slide">
                    <span class="material-icons">navigate_next</span>
                </button>
                <h2 class="slide-title">Details</h2>
                <button type="button" class="link-btn show" form="projectDetailForm" data-toggle="form" data-action="edit">
                    Edit
                </button>
            </div>

            <div class="slide-body">
                <form action="/index.html" method="post" id="projectDetailForm">

                    <h3 class="detail-header">Project</h3>

                    <div class="linear">
        
                        <div class="form-input-group">
                            <label for="">Purchase Order #</label>
                            <input type="text" value="<?= $data['purchase_ord'] ?>" readonly>
                        </div>
        
                        <div class="form-input-group">
                            <label for="">Date of Award</label>
                            <input type="date" value="<?= $data['award_date'] ?>" readonly>
                        </div>

                    </div>

                    <div class="form-input-group">
                        <label for="">Work Description</label>
                        <textarea name="" id="" rows="1" readonly><?= $data['name'] ?></textarea>
                    </div>

                    <div class="form-input-group">
                        <label for="">Building no.</label>
                        <input type="text" value="<?= $data['building_number'] ?>" readonly>
                    </div>

                    <div class="form-input-group">
                        <label for="">Location</label>
                        <input type="text" value="<?= $data['location'] ?>" readonly>
                    </div>         
                    

                    <h3 class="detail-header">Client</h3>

                    <div class="form-input-group">
                        <label for="">Company</label>
                        <input type="text" value="<?= $data['company'] ?>" readonly>
                    </div>

                    <div class="form-input-group">
                        <label for="">Representative</label>
                        <input type="text" value="<?= $data['comp_representative'] ?>" readonly>
                    </div>

                    <div class="form-input-group">
                        <label for="">Contact</label>
                        <input type="tel" value="<?= $data['comp_contact'] ?>" readonly>
                    </div>



                </form>
            </div>

            <div class="slide-footer">
                <button class="btn sm-btn success-btn">Mark as done</button>
                <button class="btn sm-btn danger-btn">Remove project</button>
            </div>
        </div>
    </div>

    <nav class="nav-tab-container border-bottom">
        <ul class="nav-tab">
            <li class="nav-tab-item active">
                <button class="link-btn" data-toggle="custom-tab" data-target="#projectGanttChart">Gantt Chart</button>
            </li>
            <li class="nav-tab-item">
                <button class="link-btn" data-toggle="custom-tab" data-target="#projectResources">Resources</button>
            </li>
            <li class="nav-tab-item">
                <button class="link-btn" data-toggle="custom-tab" data-target="#projectPeople">People</button>
            </li>
            <li class="nav-tab-item">
                <button class="link-btn" data-toggle="custom-tab" data-target="#projectPayment">Payment</button>
            </li>
        </ul>

        <div>                   
            <!--
            <button class="btn action-btn" data-toggle="custom-tab" data-target="#projectInvoice">Invoice</button>
            <button class="btn action-btn" data-toggle="custom-tab" data-target="#projectTurnOver">Turn Over</button>
                -->
            
            <a class="btn action-btn" data-toggle="custom-tab" href="invoice-admin.html">Invoice</a>
            <a class="btn action-btn" data-toggle="custom-tab" href="turnover-admin.html">Turn Over</a> 
    
        </div>

    </nav>

    <!-- <div class="slide-container"> -->
        <div class="custom-tab-container">

            <style>
                .slider {
                    height: 100%;
                    overflow: hidden;
                    display: flex;
                    flex-direction: row;
                }

                .slider > div {
                    flex-grow: 1;
                    flex-shrink: 0;
                }

                .timeline {
                    display: grid;
                    gap: 10px;
                    margin-left: -100%;
                    width: 100%;
                    overflow-y: auto;
                }

                /* #timelineTable.mesa-container {
                    overflow: auto;
                } */


                .chart-container {  
                    width: 100%;
                    overflow: hidden;
                }

                #tasksTable thead {
                    position: sticky;
                    top: 0;
                }

                td .form-input-group {
                    margin: 0;
                }

                .main-content header, .main-content footer {
                    padding: 1rem 20px;
                }
            </style>

            <!-- Gantt Chart -->
            <section id="projectGanttChart" class="main-content custom-tab-content show">
                <div class="slider">
                    <div class="timeline">
                        <header class="linear-center">
                            <h5>Tasks</h5>
                            
                            <button id="addTask" data-target="#newTask" type="button" class="btn action-btn sm-btn">
                                <i class="fa fa-plus btn-icon" aria-hidden="true"></i>
                                Add a task
                            </button>

                            <button class="btn icon-btn ml-auto back-btn" type="button">
                                <span class="material-icons">navigate_before</span>
                            </button>
                        </header>

                        <div class="mesa-container" id="timelineTable">
                            <table class="mesa" id="tasksTable">
                                <thead class="mesa-head">
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col" class="taskCell">Task</th>
                                        <th scope="col">Plan Start</th>
                                        <th scope="col">Plan Due</th>
                                        <th scope="col" class="action-cell">
                                        </th>
                                    </tr>
                                </thead>
                            </table>

                            <div id="samp"></div>
                        </div>

                        <footer class="hide">
                            <form data-row="#timelineTable" id="newTask">
                                <table class="mesa">
                                    <tr>
                                        <!-- Task Number -->
                                        <th scope="row" class="rowNum"> 
                                            <!-- <input type="hidden" name="taskNum" value="1"> -->
                                        </th>

                                        <!-- Description -->
                                        <td class="taskCell">
                                            <div class="form-input-group">
                                                <textarea oninput="autoHeight(this)" name="taskDesc" rows="1"></textarea>
                                            </div>
                                        </td>

                                        <!-- Plan Start -->
                                        <td class="dateCell">
                                            <div class="form-input-group">
                                                <input type="date" name="planStart" value="<?= date('Y-m-d') ?>">
                                            </div>
                                        </td>

                                        <!-- Plan End -->
                                        <td class="dateCell">
                                            <div class="form-input-group">
                                                <input type="date" name="planEnd" value="<?= date('Y-m-d') ?>">
                                            </div>
                                        </td>

                                        <!-- Actions -->
                                        <td class="action-cell">
                                            <div class="action-cell-content">
                                                <span class="row-action-btns">
                                                    <button class="btn icon-btn neutral-btn" type="button">
                                                        <span class="material-icons">cancel</span>
                                                    </button>
                                                    <button class="btn icon-btn" type="submit" name="createTask">
                                                        <span class="material-icons success-text">check_circle</span>
                                                    </button>
                                                </span>
                                            </div>                                            
                                        </td>

                                    </tr>
                                </table>
                                
                                <!-- Alert -->
                                <div class="alert alert-danger mb-0" role="alert">
                                    A simple danger alert—check it out!
                                </div>
                            </form>
                        </footer>
                    </div>

                    <div class="chart-container">
                        <div class="gantt-chart">                        
                            <div class="chart">
                                <div class="chart-row chart-header">
                                    <div class="chart-row-item" id="timelineToggler">
                                        <button type="button" class="btn icon-btn">
                                            <span class="material-icons">edit_note</span>
                                        </button>
                                        Tasks
                                    </div>
                                    <div>
                                        <div class="chart-months">
                                            <span class="startMonth">December</span>
                                            <!-- <span class="month30">January</span> -->
                                        </div>
                                        <div class="chart-days">
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                            <span>##</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="chart-body">
                                    <div class="chart-lines"> 
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>

                                    <div class="chart-row">
                                        <div class="chart-row-item">
                                            <strong>1</strong>
                                            Procurement
                                        </div>
                                        <ul class="chart-row-bars">
                                            <li class="plan chart-li-one"></li>
                                        </ul>
                                    </div>

                                    <div class="chart-row">
                                        <div class="chart-row-item">
                                            <strong>2</strong>
                                            Tool Box Meeting
                                        </div>
                                        <ul class="chart-row-bars">
                                            <li class="plan chart-li-two-a"></li>
                                            <li class="actual chart-li-two-b"></li>          
                                        </ul>
                                    </div>

                                    <div class="chart-row">
                                        <div class="chart-row-item">
                                            <strong>3</strong>
                                            Actual visit at site for measurement
                                        </div>
                                        <ul class="chart-row-bars">
                                            <li class="plan chart-li-three"></li>
                                        </ul>
                                    </div>

                                    <div class="chart-row">
                                        <div class="chart-row-item">
                                            <strong>4</strong>
                                            Mobilization
                                        </div>
                                        <ul class="chart-row-bars">
                                            <li class="plan chart-li-four"></li>
                                        </ul>
                                    </div>

                                    <div class="chart-row">
                                        <div class="chart-row-item">
                                            <strong>5</strong>
                                            Repainting of pipe
                                        </div>
                                        <ul class="chart-row-bars">
                                            <li class="plan chart-li-five"></li>
                                        </ul>
                                    </div>

                                    <div class="chart-row">
                                        <div class="chart-row-item">
                                            <strong>6</strong>
                                            Relocation of 2" Distribution line from Handyman's area (removal and Reinstall with 55 meter located at Upper ground)
                                        </div>
                                        <ul class="chart-row-bars">
                                            <li class="plan chart-li-six"></li>
                                        </ul>
                                    </div>
                                    
                                    <div class="chart-row">
                                        <div class="chart-row-item">
                                            <strong>7</strong>
                                            Modification of 2" B.I. pipe (step-up for x 600mm 10meter long) due to modification of wall from concrete to glass wall at Second floor.
                                        </div>
                                        <ul class="chart-row-bars">
                                            <li class="plan chart-li-seven-t1"></li>
                                        </ul>

                                        <div class="chart-row-item">
                                            <strong></strong>
                                            Modification of 2" Distribution pipe line second floor due to aircon   ducting conflict with 15 meter long.
                                        </div>
                                        <ul class="chart-row-bars">
                                            <li class="plan chart-li-seven-t2"></li>
                                        </ul>
                                    </div>

                                    <div class="chart-row">
                                        <div class="chart-row-item">
                                            <strong>8</strong>
                                            Additional stub-out for 6 tenants and additional pipe line for 12- tenats  from existing stub-outs to meter location inside the tenant area.
                                        </div>
                                        <ul class="chart-row-bars">
                                            <li class="plan chart-li-8-t1"></li>
                                        </ul>

                                        <div class="chart-row-item">
                                            <strong></strong>
                                            Leak Test and commissioning  at 2F, UGF, LGF
                                        </div>
                                        <ul class="chart-row-bars">
                                            <li class="plan chart-li-8-t2"></li>
                                        </ul>

                                        <div class="chart-row-item">
                                            <strong></strong>
                                            Additional 2-1/2"  LPG mainline and stubouts for Vikings, Tongyang and 3 tenants
                                        </div>
                                        <ul class="chart-row-bars">
                                            <li class="yellow-bar chart-li-8-t3"></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <span class="expanding-btn">
                            <button class="btn action-btn icon-btn" data-toggle="popup" data-target="#viewLegends">
                                <span class="material-icons">legend_toggle</span>
                            </button>
                        </span>

                        <!-- View Legends Popup -->
                        <div id="viewLegends" class="popup popup-contained" tabindex="-1" aria-hidden="true">
                            <div class="pcontainer popup-sm" data-right="15" data-bottom="35">
                                <div class="pcontent">
                                    <div class="pheader">
                                        <h2 class="ptitle">Legends</h2>
                                        <button type="button" class="icon-btn close-btn" data-dismiss="popup" aria-label="Close">
                                            <span class="material-icons">close</span>
                                        </button>
                                    </div>
                        
                                    <div class="pbody">
                                        <div class="legends-container">
                                            <div class="task-legend">
                                                <span class="leg-color" data-color="#026aa7"></span>
                                                <span class="leg-title">Plan</span>
                                                <button class="btn icon-btn leg-edit" data-toggle="legend" data-target="legendId">
                                                    <span class="material-icons">edit</span>
                                                </button>
                                            </div>

                                            <div class="task-legend">
                                                <span class="leg-color" data-color="#5aac44"></span>
                                                <span class="leg-title">Actual</span>
                                                <button class="btn icon-btn leg-edit" data-toggle="legend" data-target="legendId">
                                                    <span class="material-icons">edit</span>
                                                </button>
                                            </div>

                                            <div class="task-legend">
                                                <span class="leg-color" data-color="#f5dd29"></span>
                                                <span class="leg-title">Sample</span>
                                                <button class="btn icon-btn leg-edit" data-toggle="legend" data-target="legendID">
                                                    <span class="material-icons">edit</span>
                                                </button>
                                            </div>

                                            <button class="btn light-btn slim-btn" data-toggle="legend">
                                                <span class="material-icons btn-icon">label</span>
                                                Create legend
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Resources -->
            <section id="projectResources" class="main-content custom-tab-content">

                <!-- Resources Table -->
                <div class="mesa-container">                
                    <table class="mesa">
                        <thead class="mesa-head">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" class="tname"><strong>Item Name</strong></th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price per item (PHP)</th>
                                <th scope="col">Total Amount</th>
                                <th scope="col">Notes</th>
                                <th scope="col" class="table-action-col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td><strong>Patatas</strong></td>
                                <td>8</td>
                                <td>300</td>
                                <td>2,400</td>
                                <td>Mahal lods</td>
                                <td class="action-cell">
                                    <div class="action-cell-content">
                                        <button class="dots-menu-btn"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                        <span class="row-action-btns">
                                            <button class="btn icon-btn"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td><strong>Patatas</strong></td>
                                <td>8</td>
                                <td>300</td>
                                <td>2,400</td>
                                <td>Mahal lods</td>
                                <td class="action-cell">
                                    <div class="action-cell-content">
                                        <button class="dots-menu-btn"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                        <span class="row-action-btns">
                                            <button class="btn icon-btn"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td><strong>Patatas</strong></td>
                                <td>8</td>
                                <td>300</td>
                                <td>2,400</td>
                                <td>Mahal lods</td>
                                <td class="action-cell">
                                    <div class="action-cell-content">
                                        <button class="dots-menu-btn"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                        <span class="row-action-btns">
                                            <button class="btn icon-btn"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td><strong>Patatas</strong></td>
                                <td>8</td>
                                <td>300</td>
                                <td>2,400</td>
                                <td>Mahal lods</td>
                                <td class="action-cell">
                                    <div class="action-cell-content">
                                        <button class="dots-menu-btn"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                        <span class="row-action-btns">
                                            <button class="btn icon-btn"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td><strong>Patatas</strong></td>
                                <td>8</td>
                                <td>300</td>
                                <td>2,400</td>
                                <td>Mahal lods</td>
                                <td class="action-cell">
                                    <div class="action-cell-content">
                                        <button class="dots-menu-btn"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                                        <span class="row-action-btns">
                                            <button class="btn icon-btn"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <button type="button" class="btn action-btn slim-btn align-self-start">
                    <i class="fa fa-plus btn-icon" aria-hidden="true"></i>
                    Add resource
                </button>
            </section>
            
            <!-- People -->
            <section id="projectPeople" class="main-content custom-tab-content">

                <nav class="linear w-100">
                    <button class="btn btn-sm link-btn" data-toggle="popup" data-target="#Pending" aria-expanded="false">
                        Pending invitations
                    </button>
                    <a class="" href="../admin/generateslip.html">
                    <button class="btn btn-sm action-btn" type="button" data-toggle="popup" aria-expanded="false">
                        Generate Slip
                    </button></a>
                    <div class="dropdown ml-auto">
                        
                        <button class="btn btn-sm dropdown-toggle action-btn" type="button" data-toggle="dropdown" aria-expanded="false">
                            Add people
                        </button>

                        <div class="dropdown-menu dropdown-menu-lg-right">
                            <button class="dropdown-item" type="button" data-toggle="popup" data-target="#InvitePeople" aria-expanded="false">
                            Invite
                            </button>
                            <button class="dropdown-item" type="button" data-toggle="popup" data-target="#ChooseFromTeam" aria-expanded="false">
                                Choose from team
                            </button>   
                        </div>
                    </div>
                </nav>
                <!-- <div class="linear"> -->
                    <!-- <form action="" class=""> -->
                    <!-- <div class="input-container">
                        <input type="text" placeholder="Enter an email address or number of a person you want to invite.">
                        <div class="input-append">
                            <button type="button" class="btn action-btn slim-btn">Invite person</button>
                        </div>
                    </div>

                    <span class="align-self-center">or</span>

                    <button class="btn action-btn slim-btn  ">Choose from Team</button> -->
                    <!-- </form> -->
                <!-- </div> -->

                <!-- People Table -->
                <div class="mesa-container">
                    <table class="mesa">
                        <thead class="mesa-head">
                            <tr>
                                <th scope="col" class="tname"><strong>Name</strong></th>
                                <th scope="col">Email</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Priviledge</th>
                                <th scope="col" class="table-action-col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Eli Lamzon</strong></td>
                                <td>elilamzon@email.com</td>
                                <td>09xxxxxxxxx</td>
                                <td>Admin</td>
                                <td>Remove</td>
                            </tr>
                            <tr>

                                <td><strong>Effer Adaza</strong></td>
                                <td>EfferAdaza@email.com</td>
                                <td>09xxxxxxxxx</td>
                                <td>Admin</td>
                                <td>Remove</td>
                            </tr>
                            <tr>
                                <td><strong>Yva Magno</strong></td>
                                <td>YvaMagno@email.com</td>
                                <td>09xxxxxxxxx</td>
                                <td>Admin</td>
                                <td>Remove</td>
                            </tr>
                            <tr>
                                <td><strong>Gale Fernandez</strong></td>
                                <td>GaleFernandez@email.com</td>
                                <td>09xxxxxxxxx</td>
                                <td>Admin</td>
                                <td>Remove</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Payment -->
            <section id="projectPayment" class="main-content custom-tab-content">


                <!-- Payment Table -->
                <div class="mesa-container">
                    <table class="mesa">
                        <thead class="mesa-head">
                            <tr>
                                <th scope="col" class="tname"><strong>Description</strong></th>
                                <th scope="col">Payment</th>
                                <th scope="col">Date</th>
                                <th scope="col" class="table-action-col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>Tank Requalification Fire Protection System</strong><br>
                                    <small>Phoenix</small>
                                </td>
                                <td>PHP 12,000</td>
                                <td>dd/mm/YYYY</td>
                                <td>Remove</td>
                            </tr>
                            <tr>
                                <td><strong>Centralized LPG Pipeline Installation</strong><br>
                                    <small>Phoenix</small>
                                </td>
                                <td>PHP 12,000</td>
                                <td>dd/mm/YYYY</td>
                                <td>Remove</td>
                            </tr>
                            <tr>
                                <td><strong></strong><br>
                                    <small>Phoenix</small>
                                </td>
                                <td>PHP 12,000</td>
                                <td>dd/mm/YYYY</td>
                                <td>Remove</td>
                            </tr>
                            <tr>
                                <td><strong></strong><br>
                                    <small>Phoenix</small>
                                </td>
                                <td>PHP 12,000</td>
                                <td>dd/mm/YYYY</td>
                                <td>Remove</td>
                            </tr>
                            <tr>
                                <td><strong></strong><br>
                                    <small>Phoenix</small>
                                </td>
                                <td>PHP 12,000</td>
                                <td>dd/mm/YYYY</td>
                                <td>Remove</td>
                            </tr>
                            <tr>
                                <td><strong></strong><br>
                                    <small>Phoenix</small>
                                </td>
                                <td>PHP 12,000</td>
                                <td>dd/mm/YYYY</td>
                                <td>Remove</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

        </div>
    <!-- </div> -->
</main>

<style>
    #taskPopup .pcontent {
        flex-direction: row;
    }

    .pmain {
        flex-basis: 65%;
        padding: 1rem;

        background-color: #f4f4f4;
    }

    .pmain .pheader {
        border: none;
        padding: 0;
        margin-bottom: 1rem;
    }

    .pmain .pfooter {
        padding: 0;
        margin-top: 1rem;
        padding-top: 1rem;
    }

    .pmain .pheader .close-btn {
        top: 0;
        right: 0;
    }

    .pmain h5 {
        font-size: 14px;
        color: #172b4d;
    }

    .pmain textarea, .pmain input {
        padding: 5px 10px;
    }

    .pside {
        flex-basis: 35%;

        display: flex;
        flex-direction: column;

        box-shadow: -1px 0 10px rgba(0, 0, 0, 0.15);
        position: relative;
    }

    @media (max-width: 992px) {
        #taskPopup .pcontent {
            flex-direction: column;
        }

        #sideCollapse {
            height: 0;
        }

        .pmain {
            background-color: white;
        }
    }

    @media (min-width: 992px) {
        #activityCollapse {
            display: none;
        }

        #sideCollapse {
            height: 100%;
        }
    }
        
    #activityCollapse {
        position: absolute;
        top: -20px;
        left: 50%;
        z-index: 2005;
        transform: translateX(-50%);
        background: #ffffff;
        border-radius: 500px;
        padding: 5px;
        box-shadow: 0 -1px 5px rgba(0, 0, 0, 0.15);
    }

    #sideCollapse {
        overflow: hidden;
    }
</style>

<!-- Task -->
<div class="popup slide-right" id="taskPopup" tabindex="-1" aria-hidden="true">
    <div class="pcontainer popup-lg">
        <div class="pcontent">
            <div class="pmain">

                <header class="pheader">
                    <h2 class="ptitle">Task #</h2>
                    <button type="button" class="icon-btn close-btn" data-dismiss="popup" aria-label="Close">
                        <span class="material-icons">close</span>
                    </button>
                </header>
                
                <h5>Description</h5> 
                <div class="form-input-group">
                    <textarea class="form-control" name="taskDesc" id="" rows="1"  placeholder="Type the project description here">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras justo massa, suscipit eu ultricies sit amet, aliquet at neque. Duis dictum, ipsum suscipit blandit interdum, </textarea>
                </div>
                
                <h5 for="">Activity</h5>

                <div id="taskActivities">

                </div>
                <div id="newActivities">

                </div>

                <!-- <div class="form-input-group task-activity">
                    <span class="linear-label">
                        <label for="">Plan</label>
                        <button type="button" class="icon-btn close-btn" data-dismiss="activity" aria-label="Close">
                            <span class="material-icons">close</span>
                        </button>
                    </span>
                    <div class="tb-date">
                        <input type="date" name="planStart" id="" value="<?= date('Y-m-d') ?>">
                        -
                        <input type="date" name="planEnd" id="" value="<?= date('Y-m-d') ?>">
                    </div>
                </div>

                <div class="form-input-group task-activity">
                    <label for="">Actual</label>
                    <div class="tb-date">
                        <input type="date" name="" id="">
                        -
                        <input type="date" name="" id="">
                    </div>
                </div> -->
            </div>

            <div class="pside">
                <button class="btn icon-btn" id="activityCollapse" data-target="#sideCollapse">
                    <span class="material-icons" title="Add activity">
                        keyboard_double_arrow_up
                    </span>
                </button>

                <div id="sideCollapse">
                    <div class="pheader">
                        <h2 class="ptitle">Activities</h2>
                        <button type="button" class="icon-btn close-btn" data-dismiss="popup" aria-label="Close">
                            <span class="material-icons">close</span>
                        </button>
                    </div>

                    <div class="pbody">
                        <i class="fa fa-search" aria-hidden="true"></i>

                        <div id="legends" class="legends-container">
                            <div class="task-legend">
                                <span class="leg-color" data-color="#026aa7"></span>
                                <span class="leg-title">Plan</span>
                                <button class="btn icon-btn leg-edit" data-toggle="legend" data-target="legendId">
                                    <span class="material-icons">edit</span>
                                </button>
                            </div>

                            <div class="task-legend">
                                <span class="leg-color" data-color="#5aac44"></span>
                                <span class="leg-title">Actual</span>
                                <button class="btn icon-btn leg-edit" data-toggle="legend" data-target="legendId">
                                    <span class="material-icons">edit</span>
                                </button>
                            </div>

                            <div class="task-legend">
                                <span class="leg-color" data-color="#f5dd29"></span>
                                <span class="leg-title">Sample</span>
                                <button class="btn icon-btn leg-edit" data-toggle="legend" data-target="legendID">
                                    <span class="material-icons">edit</span>
                                </button>
                            </div>
                        </div>

                        <button class="btn light-btn btn-block slim-btn" data-toggle="legend">
                            Create legend
                        </button>
                    </div>

                </div>

                <div class="pfooter">
                    <button type="submit" form="legendForm" class="btn action-btn">Save</button>
                    <button type="button" class="btn danger-btn">Delete</button>
                    <button type="button" class="btn neutral-outline-btn" data-dismiss="popup">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let projectId = '<?= $data['id'] ?>';
</script>
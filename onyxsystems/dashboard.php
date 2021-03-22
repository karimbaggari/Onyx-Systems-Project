<?php
include 'db_conn.php';
$sql = 'SELECT * FROM products';

$result = mysqli_query($conn, $sql);

$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_SESSION['usersId']) && isset($_SESSION['usersUsername'])) {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, base-scale=1.0">
    <meta name="description" content="Dashboard for managing the store's inventory">
    <title>Onyx Systems</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>
    <!-- Sidebar Navigation for Desktop -->
    <nav>
        <div class="sidebar">
            <img src="images/logo.svg" alt="Logo" style="width: 90px;" class="sidebar-logo">
            <div class="nav-icons">
                <img src="icons/dashboard.svg" alt="" class="sidebar-icon">
                <img src="icons/contacts.svg" alt="" class="sidebar-icon">
                <img src="icons/inbox.svg" alt="" class="sidebar-icon">
                <img src="icons/graph.svg" alt="" class="sidebar-icon">
                <img src="icons/settings.svg" alt="" class="sidebar-icon">
                <a href="logout.php"><img src="icons/logout.svg" alt="logout" class="sidebar-icon"></a>
            </div>
        </div>
    </nav>
    <!-- Logo and Search Bar Fixed at the Top -->
    <section class="top-section">
        <div class="logo">
            <h1><span>Onyx</span> Systems</h1>
        </div>
        <!-- Search Bar -->
        <div class="search-container">
            <div class="search-bar">
                <input type="text" placeholder="Search.." class="search">
                <img src="icons/search.svg" alt="Search Icon" class="search-icon">
            </div>
        </div>
        <!-- Button at the top to show the Add Product Form for Desktop -->
        <button class="add" id="add-desktop" onclick="viewAdd()">+ Add Product</button>
        <!-- Top Right Icons -->
        <div class="top-right-icons">
            <img src="icons/bell.svg" alt="" class="tr-icon">
            <img src="icons/message.svg" alt="" class="tr-icon">
            <img src="icons/user.svg" alt="" class="tr-icon">
        </div>
    </section>
    <!-- Fixed Buttons on the Bottom *before the middle section so that the buttons show on top of the middle section on desktop-->
    <section class="bottom-section">
        <div class="bottom-buttons">
            <!-- Button to show the Add Product Form for Mobile -->
            <button class="add" id="add" onclick="viewAdd()">+ Add Product</button>
            <!-- Button to confirm the Add product Form -->
            <button type="submit" class="confirm" id="confirm-add" form="add-form">Confirm</button> <!--  onclick="closeAdd()" -->
            <!-- Button to confirm the Edit Form -->
            <button class="confirm" id="confirm-edit" onclick="confirmEdit()">Confirm</button>
            <!-- Buttons for Product Details -->
            <div class="view-buttons" id="view-buttons">
                <button class="edit" onclick="viewEdit()">Edit</button>
                <button class="delete" onclick="confirmDelete()">Delete</button>
            </div>
        </div>
    </section>
    <!-- Store Inventory -->
    <section class="middle-section">
        <!-- Edit Confirmation Overlay -->
        <div class="edit-confirm" id="edit-confirm">
            <img class="close" src="icons/close.svg" alt="Close Overlay" onclick="closeOverlay()">
            <h3 class="name"></h3>
            <p class="sure">Are you sure you wanna edit this product ?</p>
            <!-- Buttons for Confirmation -->
            <div class="overlay-buttons" id="overlay-edit-buttons">
                <button type="submit" form="edit-form" id="yes-edit" class="yes">Yes</button> <!-- onclick="closeEditOverlay()" -->
                <button class="no" onclick="closeOverlay()">No</button>
            </div>
        </div>
        <!-- Delete Confirmation Overlay -->
        <div class="delete-confirm" id="delete-confirm">
            <img class="close" src="icons/close.svg" alt="Close Overlay" onclick="closeOverlay()">
            <form action="delete-product.php" class="delete-form" id="delete-form" method="GET">
                <!-- Hidden Input to take the Id -->
                <input type="text" id="id-delete" name="id-delete" readonly>
            </form>
            <h3 class="name"></h3>
            <p class="sure">Are you sure you wanna delete this product ?</p>
            <!-- Buttons for Confirmation -->
            <div class="overlay-buttons" id="overlay-delete-buttons">
                <button class="yes" type="submit" form="delete-form" id="yes-delete">Yes</button> <!-- onclick="closeDeleteOverlay()" -->
                <button class="no" onclick="closeOverlay()">No</button>
            </div>
        </div>
        <!-- Add Product Form -->
        <div class="add-product" id="add-product">
            <!-- Icons at the top left -->
            <img class="return" src="icons/return.svg" alt="Return to Previous Page" onclick="closeAdd()">
            <!-- Icons at the top left -->
            <form action="add-product.php" class="add-form" id="add-form" method="POST">
                <div class="tooltip">
                    <input type="text" id="name" name="name" placeholder="Name">
                    <svg xmlns="http://www.w3.org/2000/svg" width="55px" height="25px" viewBox="0 0 24.88 24.88"
                        class="info-icon" id="info-name">
                        <path id="info-icon-name" data-name="Icon awesome-info-circle"
                            d="M13,.563A12.44,12.44,0,1,0,25.442,13,12.442,12.442,0,0,0,13,.563ZM13,6.08A2.107,2.107,0,1,1,10.9,8.187,2.107,2.107,0,0,1,13,6.08Zm2.809,12.741a.6.6,0,0,1-.6.6H10.8a.6.6,0,0,1-.6-.6v-1.2a.6.6,0,0,1,.6-.6h.6v-3.21h-.6a.6.6,0,0,1-.6-.6V12a.6.6,0,0,1,.6-.6h3.21a.6.6,0,0,1,.6.6v5.016h.6a.6.6,0,0,1,.6.6Z"
                            transform="translate(-0.563 -0.563)" fill="#3a8ec7" />
                    </svg>
                    <span class="tooltip-info" id="tooltip-name">Uppercase and Lowercase characters. Spaces and Numbers are allowed.</span>
                </div>

                <div class="tooltip">
                    <input type="text" name="brand" id="brand" placeholder="Brand">
                    <svg xmlns="http://www.w3.org/2000/svg" width="55px" height="25px" viewBox="0 0 24.88 24.88"
                        class="info-icon" id="info-brand">
                        <path id="info-icon-brand" data-name="Icon awesome-info-circle"
                            d="M13,.563A12.44,12.44,0,1,0,25.442,13,12.442,12.442,0,0,0,13,.563ZM13,6.08A2.107,2.107,0,1,1,10.9,8.187,2.107,2.107,0,0,1,13,6.08Zm2.809,12.741a.6.6,0,0,1-.6.6H10.8a.6.6,0,0,1-.6-.6v-1.2a.6.6,0,0,1,.6-.6h.6v-3.21h-.6a.6.6,0,0,1-.6-.6V12a.6.6,0,0,1,.6-.6h3.21a.6.6,0,0,1,.6.6v5.016h.6a.6.6,0,0,1,.6.6Z"
                            transform="translate(-0.563 -0.563)" fill="#3a8ec7" />
                    </svg>
                    <span class="tooltip-info" id="tooltip-brand">Uppercase and Lowercase characters. Spaces, Numbers, Parentheses and Hyphens are allowed.</span>
                </div>

                <div class="tooltip">
                    <input type="text" id="microprocessor" name="microprocessor" placeholder="Microprocessor">
                    <svg xmlns="http://www.w3.org/2000/svg" width="55px" height="25px" viewBox="0 0 24.88 24.88"
                        class="info-icon" id="info-cpu">
                        <path id="info-icon-cpu" data-name="Icon awesome-info-circle"
                            d="M13,.563A12.44,12.44,0,1,0,25.442,13,12.442,12.442,0,0,0,13,.563ZM13,6.08A2.107,2.107,0,1,1,10.9,8.187,2.107,2.107,0,0,1,13,6.08Zm2.809,12.741a.6.6,0,0,1-.6.6H10.8a.6.6,0,0,1-.6-.6v-1.2a.6.6,0,0,1,.6-.6h.6v-3.21h-.6a.6.6,0,0,1-.6-.6V12a.6.6,0,0,1,.6-.6h3.21a.6.6,0,0,1,.6.6v5.016h.6a.6.6,0,0,1,.6.6Z"
                            transform="translate(-0.563 -0.563)" fill="#3a8ec7" />
                    </svg>
                    <span class="tooltip-info" id="tooltip-cpu">1 number point 1 number followed by Ghz (case sensitive)
                        followed by brand name and core-count (ex: 2.5GHz AMD Dual-Core).</span>
                </div>

                <div class="tooltip">
                    <input type="text" name="memory" id="memory" placeholder="Memory">
                    <svg xmlns="http://www.w3.org/2000/svg" width="55px" height="25px" viewBox="0 0 24.88 24.88"
                        class="info-icon" id="info-ram">
                        <path id="info-icon-ram" data-name="Icon awesome-info-circle"
                            d="M13,.563A12.44,12.44,0,1,0,25.442,13,12.442,12.442,0,0,0,13,.563ZM13,6.08A2.107,2.107,0,1,1,10.9,8.187,2.107,2.107,0,0,1,13,6.08Zm2.809,12.741a.6.6,0,0,1-.6.6H10.8a.6.6,0,0,1-.6-.6v-1.2a.6.6,0,0,1,.6-.6h.6v-3.21h-.6a.6.6,0,0,1-.6-.6V12a.6.6,0,0,1,.6-.6h3.21a.6.6,0,0,1,.6.6v5.016h.6a.6.6,0,0,1,.6.6Z"
                            transform="translate(-0.563 -0.563)" fill="#3a8ec7" />
                    </svg>
                    <span class="tooltip-info" id="tooltip-ram">1 to 2 numbers followed by "GB" (ex: 8GB or 16GB).</span>
                </div>

                <div class="tooltip">
                    <input type="text" name="video-graphics" id="video-card" placeholder="Video Graphics">
                    <svg xmlns="http://www.w3.org/2000/svg" width="55px" height="25px" viewBox="0 0 24.88 24.88"
                        class="info-icon" id="info-gpu">
                        <path id="info-icon-gpu" data-name="Icon awesome-info-circle"
                            d="M13,.563A12.44,12.44,0,1,0,25.442,13,12.442,12.442,0,0,0,13,.563ZM13,6.08A2.107,2.107,0,1,1,10.9,8.187,2.107,2.107,0,0,1,13,6.08Zm2.809,12.741a.6.6,0,0,1-.6.6H10.8a.6.6,0,0,1-.6-.6v-1.2a.6.6,0,0,1,.6-.6h.6v-3.21h-.6a.6.6,0,0,1-.6-.6V12a.6.6,0,0,1,.6-.6h3.21a.6.6,0,0,1,.6.6v5.016h.6a.6.6,0,0,1,.6.6Z"
                            transform="translate(-0.563 -0.563)" fill="#3a8ec7" />
                    </svg>
                    <span class="tooltip-info" id="tooltip-gpu">2 words and a 4 digit number *all separated by spaces (ex: Nvidia GTX 2080).</span>
                </div>

                <div class="tooltip">
                    <input type="text" name="hard-drive" id="drive" placeholder="Hard Drive">
                    <svg xmlns="http://www.w3.org/2000/svg" width="55px" height="25px" viewBox="0 0 24.88 24.88"
                        class="info-icon" id="info-hdd">
                        <path id="info-icon-hdd" data-name="Icon awesome-info-circle"
                            d="M13,.563A12.44,12.44,0,1,0,25.442,13,12.442,12.442,0,0,0,13,.563ZM13,6.08A2.107,2.107,0,1,1,10.9,8.187,2.107,2.107,0,0,1,13,6.08Zm2.809,12.741a.6.6,0,0,1-.6.6H10.8a.6.6,0,0,1-.6-.6v-1.2a.6.6,0,0,1,.6-.6h.6v-3.21h-.6a.6.6,0,0,1-.6-.6V12a.6.6,0,0,1,.6-.6h3.21a.6.6,0,0,1,.6.6v5.016h.6a.6.6,0,0,1,.6.6Z"
                            transform="translate(-0.563 -0.563)" fill="#3a8ec7" />
                    </svg>
                    <span class="tooltip-info" id="tooltip-hdd">3 or 4 numbers followed by "GB" (ex: 320GB or 1024GB).</span>
                </div>
            </form>
            
        </div>
        <!-- Product Details -->
        <div class="product-details" id="product-details">
            <div class="lap-img-container">
                <img class="lap-img" src="images/laptop.png" alt="Laptop Picture">
            </div>
            <div class="details">
                <!-- Compress Icons to close the details popup -->
                <img class="compress" src="icons/compress.svg" alt="Compress to Hide Product Details"onclick="closeDetails()">
                <!-- Empty fields to hold the hidden details for each product depending on which selected -->
                <p class="id"></p>
                <h3 class="name"></h3>
                <p class="brand"></p>
                <p class="spec">Microprocessor :</p>
                <p class="cpu"></p>
                <p class="spec">Memory :</p>
                <p class="ram"></p>
                <p class="spec">Video Graphics :</p>
                <p class="gpu"></p>
                <p class="spec">Hard Drive :</p>
                <p class="hdd"></p>
            </div>
        </div>
        <!-- Edit Product Form -->
        <div class="edit-product" id="edit-product">
            <!-- Return Icon to previous "page" -->
            <img class="return" src="icons/return.svg" alt="Return to Previous Page" onclick="closeEdit()">
            <!-- Base Information -->
            <div class="lap-img-container">
                <img class="lap-img" src="images/laptop.png" alt="Laptop Picture">
            </div>
            <div class="base-edit">
                <h3 class="name"></h3>
                <p class="brand"></p>
            </div>

            <form action="edit-product.php" class="edit-form" id="edit-form" method="POST">
                <!-- Hidden Input to take the Id -->
                <input type="text" id="id-edit" name="id" readonly>

                <label for="microprocessor">Microprocessor :</label>
                <div class="tooltip">
                    <input type="text" id="micro-edit" name="microprocessor">
                    <svg xmlns="http://www.w3.org/2000/svg" width="55px" height="25px" viewBox="0 0 24.88 24.88"
                        class="info-icon" id="info-cpu-edit">
                        <path id="info-icon-cpu-edit" data-name="Icon awesome-info-circle"
                            d="M13,.563A12.44,12.44,0,1,0,25.442,13,12.442,12.442,0,0,0,13,.563ZM13,6.08A2.107,2.107,0,1,1,10.9,8.187,2.107,2.107,0,0,1,13,6.08Zm2.809,12.741a.6.6,0,0,1-.6.6H10.8a.6.6,0,0,1-.6-.6v-1.2a.6.6,0,0,1,.6-.6h.6v-3.21h-.6a.6.6,0,0,1-.6-.6V12a.6.6,0,0,1,.6-.6h3.21a.6.6,0,0,1,.6.6v5.016h.6a.6.6,0,0,1,.6.6Z"
                            transform="translate(-0.563 -0.563)" fill="#3a8ec7" />
                    </svg>
                    <span class="tooltip-info" id="tooltip-cpu-edit">1 number point 1 number followed by Ghz (case sensitive) followed by brand name and core-count (ex: 2.5GHz AMD Dual-Core).</span>
                </div>

                <label for="memory">Memory :</label>
                <div class="tooltip">
                    <input type="text" id="memory-edit" name="memory">
                    <svg xmlns="http://www.w3.org/2000/svg" width="55px" height="25px" viewBox="0 0 24.88 24.88"
                        class="info-icon" id="info-ram-edit">
                        <path id="info-icon-ram-edit" data-name="Icon awesome-info-circle"
                            d="M13,.563A12.44,12.44,0,1,0,25.442,13,12.442,12.442,0,0,0,13,.563ZM13,6.08A2.107,2.107,0,1,1,10.9,8.187,2.107,2.107,0,0,1,13,6.08Zm2.809,12.741a.6.6,0,0,1-.6.6H10.8a.6.6,0,0,1-.6-.6v-1.2a.6.6,0,0,1,.6-.6h.6v-3.21h-.6a.6.6,0,0,1-.6-.6V12a.6.6,0,0,1,.6-.6h3.21a.6.6,0,0,1,.6.6v5.016h.6a.6.6,0,0,1,.6.6Z"
                            transform="translate(-0.563 -0.563)" fill="#3a8ec7" />
                    </svg>
                    <span class="tooltip-info" id="tooltip-ram-edit">1 to 2 numbers followed by "GB" (ex: 8GB or 16GB).</span>
                </div>

                <label for="video-graphics">Video Graphics :</label>
                <div class="tooltip">
                    <input type="text" id="graphique-edit" name="video-graphics">
                    <svg xmlns="http://www.w3.org/2000/svg" width="55px" height="25px" viewBox="0 0 24.88 24.88"
                        class="info-icon" id="info-gpu-edit">
                        <path id="info-icon-gpu-edit" data-name="Icon awesome-info-circle"
                            d="M13,.563A12.44,12.44,0,1,0,25.442,13,12.442,12.442,0,0,0,13,.563ZM13,6.08A2.107,2.107,0,1,1,10.9,8.187,2.107,2.107,0,0,1,13,6.08Zm2.809,12.741a.6.6,0,0,1-.6.6H10.8a.6.6,0,0,1-.6-.6v-1.2a.6.6,0,0,1,.6-.6h.6v-3.21h-.6a.6.6,0,0,1-.6-.6V12a.6.6,0,0,1,.6-.6h3.21a.6.6,0,0,1,.6.6v5.016h.6a.6.6,0,0,1,.6.6Z"
                            transform="translate(-0.563 -0.563)" fill="#3a8ec7" />
                    </svg>
                    <span class="tooltip-info" id="tooltip-gpu-edit">2 words and a 4 digit number *all separated by spaces (ex: Nvidia GTX 2080).</span>
                </div>

                <label for="hard-drive">Hard Drive :</label>
                <div class="tooltip">
                    <input type="text" id="drive-edit" name="hard-drive">
                    <svg xmlns="http://www.w3.org/2000/svg" width="55px" height="25px" viewBox="0 0 24.88 24.88"
                        class="info-icon" id="info-hdd-edit">
                        <path id="info-icon-hdd-edit" data-name="Icon awesome-info-circle"
                            d="M13,.563A12.44,12.44,0,1,0,25.442,13,12.442,12.442,0,0,0,13,.563ZM13,6.08A2.107,2.107,0,1,1,10.9,8.187,2.107,2.107,0,0,1,13,6.08Zm2.809,12.741a.6.6,0,0,1-.6.6H10.8a.6.6,0,0,1-.6-.6v-1.2a.6.6,0,0,1,.6-.6h.6v-3.21h-.6a.6.6,0,0,1-.6-.6V12a.6.6,0,0,1,.6-.6h3.21a.6.6,0,0,1,.6.6v5.016h.6a.6.6,0,0,1,.6.6Z"
                            transform="translate(-0.563 -0.563)" fill="#3a8ec7" />
                    </svg>
                    <span class="tooltip-info" id="tooltip-hdd-edit">3 or 4 numbers followed by "GB" (ex: 320GB or 1024GB).</span>
                </div>

            </form>
        </div>
        <!-- All Products -->
        <?php foreach ($products as $row) { ?>

        <div class="all-products" id="all-products">

            <div class="product">
                <!-- Expand Icon to show the details -->
                <img class="expand" src="icons/expand.svg" alt="Expand to View Product Details">
                <!-- Hidden Product Details informations to be inserted into the Details Popup and the input fields of the Edit Form -->
                <div class="hidden_information">
                    <p class="id"><?php echo $row['productId']?></p>
                    <div class="base">
                        <h3 class="name"><?php echo $row['productName']?></h3>
                        <p class="brand"><?php echo $row['productBrand']?></p>
                    </div>
                    <p class="cpu"><?php echo $row['productCpu']?></p>
                    <p class="ram"><?php echo $row['productRam']?></p>
                    <p class="gpu"><?php echo $row['productGpu']?></p>
                    <p class="hdd"><?php echo $row['productHdd']?></p>
                </div>
                <!-- Base Information -->
                <div class="lap-img-container">
                    <img class="lap-img" src="images/laptop.png" alt="Laptop Picture">
                </div>
                <div class="base">
                    <h3 class="name"><?php echo $row['productName']?></h3>
                    <p class="brand"><?php echo $row['productBrand']?></p>
                </div>
            </div>
            
        </div>

        <?php } ?>
    </section>
    <!-- Javascript File -->
    <script src="javascript/dashboard.js"></script>
</body>
</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
?>
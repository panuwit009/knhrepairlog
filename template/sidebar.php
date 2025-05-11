
<style>
    .nav-item.disabled a {
        color: rgba(0, 0, 0, 0.5);
        /* ปรับความโปร่งใสของสีตามต้องการ */
    }

    .nav-item.disabled a:hover {
        background-color: transparent;
        /* เมื่อ hover ปรับสีพื้นหลังให้เป็นโปร่งใส */
    }
</style>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-secondary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link bg-dark">
        <img src="logo.ico" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light" style="font-size: 13px;">โรงพยาบาลพระนารายณ์มหาราช</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center">
            <div class="info1">
                <a style="text-align: center;">รับ</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <!-- nav-compact -->
            <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">MENU</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-chart-line"></i>
                        <p>
                            Dashboard & Report
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php
                        // กำหนดรายการเมนูในอาร์เรย์
                        $menu_items = [
                            'index' => ['label' => 'Dashboard', 'icon' => 'fa-solid fa-pencil', 'allowed_types' => ['admin'], 'menu_name' => 'index'],
                            'ohdex' => ['label' => 'People', 'icon' => 'fa-solid fa-pencil', 'allowed_types' => ['admin'], 'menu_name' => 'ohdex']
                        ];

                        foreach ($menu_items as $href => $item) {
                            $active_class = ($menu == $item['menu_name']) ? 'active' : '';
                            $disabled_class = isset($item['disabled']) && $item['disabled'] ? 'disabled' : '';
                            if (!isset($item['allowed_types']) || (isset($_SESSION['role_menu']) && in_array($_SESSION['role_menu'], $item['allowed_types']))) {
                        ?>
                                <li class="nav-item <?= $disabled_class ?>">
                                    <a href="<?= $href ?>" class="nav-link <?= $active_class ?> <?= $disabled_class ?>">
                                        <i class="nav-icon <?= $item['icon'] ?>"></i>
                                        <p style="font-size: smaller;"><?= $item['label'] ?></p>
                                        <?php if (isset($item['disabled']) && $item['disabled']) { ?>
                                            <span class="badge badge-success ml-2" style="background-color: #e51c23;">Soon</span>
                                        <?php } ?>
                                    </a>
                                </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-regular fa-folder-open"></i>
                        <p>
                            ส่งแผนงานโครงการ
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php
                        // กำหนดรายการเมนูในอาร์เรย์
                        $menu_items = [
                            'checkplan' => ['label' => 'ตรวจแผนส่ง', 'icon' => 'fa-solid fa-pencil', 'allowed_types' => ['admin'], 'menu_name' => 'checkplan'],
                            'trackdoc' => ['label' => 'ติดตามเอกสาร', 'icon' => 'fa-solid fa-magnifying-glass', 'allowed_types' => ['admin'], 'menu_name' => 'trackdoc'],
                            'updatedoc' => ['label' => 'อัพเดทเอกสาร', 'icon' => 'fa-solid fa-magnifying-glass', 'allowed_types' => ['admin'], 'menu_name' => 'updatedoc'],
                            'sendplan' => ['label' => 'ขออนุมัติโครงการ', 'icon' => 'fa-solid fa-magnifying-glass', 'allowed_types' => ['user'], 'menu_name' => 'sendplan'],
                            'editplan' => ['label' => 'แก้ไขแบบส่งโครงการ', 'icon' => 'fa-solid fa-magnifying-glass', 'allowed_types' => ['user'], 'menu_name' => 'editplan'],
                            'cancelplan' => ['label' => 'ยกเลิกโครงการ', 'icon' => 'fa-solid fa-magnifying-glass', 'allowed_types' => ['user'], 'menu_name' => 'cancelplan'],
                        ];

                        foreach ($menu_items as $href => $item) {
                            $active_class = ($menu == $item['menu_name']) ? 'active' : '';
                            $disabled_class = isset($item['disabled']) && $item['disabled'] ? 'disabled' : '';
                            if (!isset($item['allowed_types']) || (isset($_SESSION['role_menu']) && in_array($_SESSION['role_menu'], $item['allowed_types']))) {
                        ?>
                                <li class="nav-item <?= $disabled_class ?>">
                                    <a href="<?= $href ?>" class="nav-link <?= $active_class ?> <?= $disabled_class ?>">
                                        <i class="nav-icon <?= $item['icon'] ?>"></i>
                                        <p style="font-size: smaller;"><?= $item['label'] ?></p>
                                        <?php if (isset($item['disabled']) && $item['disabled']) { ?>
                                            <span class="badge badge-success ml-2" style="background-color: #e51c23;">Soon</span>
                                        <?php } ?>
                                    </a>
                                </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-regular fa-folder-open"></i>
                        <p>
                            เอกสารผ่านอนุมัติ(สสจ.)
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php
                        // กำหนดรายการเมนูในอาร์เรย์
                        $menu_items = [
                            'passdoc' => ['label' => 'เอกสารผ่านอนุมัติ(สสจ.)', 'icon' => 'fa-solid fa-pencil', 'allowed_types' => ['admin'], 'menu_name' => 'passdoc'],
                            'canceldoc' => ['label' => 'เอกสารยกเลิกโครงการ', 'icon' => 'fa-solid fa-magnifying-glass', 'allowed_types' => ['admin'], 'menu_name' => 'canceldoc'],
                            'canceldoc1' => ['label' => 'เอกสารยกเลิกโครงการ', 'icon' => 'fa-solid fa-magnifying-glass', 'allowed_types' => ['user'], 'menu_name' => 'canceldoc1'],
                        ];

                        foreach ($menu_items as $href => $item) {
                            $active_class = ($menu == $item['menu_name']) ? 'active' : '';
                            $disabled_class = isset($item['disabled']) && $item['disabled'] ? 'disabled' : '';
                            if (!isset($item['allowed_types']) || (isset($_SESSION['role_menu']) && in_array($_SESSION['role_menu'], $item['allowed_types']))) {
                        ?>
                                <li class="nav-item <?= $disabled_class ?>">
                                    <a href="<?= $href ?>" class="nav-link <?= $active_class ?> <?= $disabled_class ?>">
                                        <i class="nav-icon <?= $item['icon'] ?>"></i>
                                        <p style="font-size: smaller;"><?= $item['label'] ?></p>
                                        <?php if (isset($item['disabled']) && $item['disabled']) { ?>
                                            <span class="badge badge-success ml-2" style="background-color: #e51c23;">Soon</span>
                                        <?php } ?>
                                    </a>
                                </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </li>
                <li class="nav-header"></li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-danger" onclick="confirmLogout()">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>ออกจากระบบ</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->

    </div>
    <script src="js/logout.js"></script>

    <!-- /.sidebar -->
</aside>
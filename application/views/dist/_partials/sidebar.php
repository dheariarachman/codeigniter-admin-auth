<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?php echo base_url(); ?>dist/index">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo base_url(); ?>dist/index">St</a>
        </div>
        <ul class="sidebar-menu">
            <?php if( $this->ion_auth->is_admin() ): ?>
            <li class="menu-header">Dashboard</li>
            <?php echo _load_menu($this->uri->segment(2), 'index', ['nav-link', 'fas fa-fire'], base_url().'dist/index', 'Dashboard') ?>
            <?php endif; ?>

            <?php if( !$this->ion_auth->is_admin() ): ?>
            <li class="menu-header">Cashier</li>
            <?php echo _load_menu($this->uri->segment(2), 'index', ['nav-link', 'fas fa-home'], base_url().'servant/index', 'Halaman Utama') ?>
            <?php endif; ?>

            <?php if( $this->ion_auth->is_admin() ): ?>
            <li class="menu-header">Administrator</li>
            <li
                class="dropdown <?php echo $this->uri->segment(2) == 'master' || $this->uri->segment(1) == 'auth' ? 'active' : ''; ?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i>
                    <span><?php echo lang('master_menu_page') ?></span></a>
                <ul class="dropdown-menu">
                    <?php echo _load_menu($this->uri->segment(1), 'auth', ['nav-link', ''], base_url().'admin/master/users', lang('users_page_list')) ?>
                    <?php echo _load_menu($this->uri->segment(3), 'menus', ['nav-link', ''], base_url().'admin/master/menus', lang('menu_page_list')) ?>
                    <?php echo _load_menu($this->uri->segment(3), 'tables', ['nav-link', ''], base_url().'admin/master/tables', lang('tables_page_list')) ?>
                    <?php echo _load_menu($this->uri->segment(3), 'billiard', ['nav-link', ''], base_url().'admin/master/billiard', lang('billiard_page_list')) ?>
                    <?php echo _load_menu($this->uri->segment(3), 'categories', ['nav-link', ''], base_url().'admin/master/categories', lang('category_menu_page')) ?>
                </ul>
            </li>

            <li class="dropdown <?php echo $this->uri->segment(2) == 'treasury' ? 'active' : ''; ?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-money-bill-wave"></i>
                    <span><?php echo lang('transaction_page') ?></span></a>
                <ul class="dropdown-menu">
                    <?php echo _load_menu($this->uri->segment(3), 'treasury', ['nav-link', ''], base_url().'admin/treasury/cash', lang('treasury_page_list')) ?>
                    <?php echo _load_menu($this->uri->segment(3), 'treasury', ['nav-link', ''], base_url().'admin/treasury/purchase', lang('purchase_page')) ?>
                </ul>
            </li>

            <li class="dropdown <?php echo $this->uri->segment(2) == 'treasury' ? 'active' : ''; ?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-inbox"></i>
                    <span><?php echo lang('inventory_page') ?></span></a>
                <ul class="dropdown-menu">
                    <?php echo _load_menu($this->uri->segment(3), 'cash', ['nav-link', ''], base_url().'admin/treasury/cash', lang('stock_in_page')) ?>
                    <?php echo _load_menu($this->uri->segment(3), 'purchase', ['nav-link', ''], base_url().'admin/treasury/purchase', lang('stock_out_page')) ?>
                </ul>
            </li>

            <li class="menu-header">Laporan</li>
            <?php echo _load_menu($this->uri->segment(3), 'purchasing', ['nav-link', 'fas fa-money-check-alt'], base_url().'admin/report/purchasing', lang('purchasing_report')) ?>
            <?php echo _load_menu($this->uri->segment(3), 'income', ['nav-link', 'fas fa-money-check-alt'], base_url().'admin/report/income', lang('income_report')) ?>
            <?php echo _load_menu($this->uri->segment(3), 'profit_loss', ['nav-link', 'fas fa-money-check-alt'], base_url().'admin/report/profit_loss', lang('profit_loss_list_report')) ?>
            <?php echo _load_menu($this->uri->segment(3), 'stock_report', ['nav-link', 'fas fa-money-check-alt'], base_url().'admin/report/stock_report', lang('stock_report')) ?>
            <?php echo _load_menu($this->uri->segment(3), 'menu_favorite', ['nav-link', 'fas fa-money-check-alt'], base_url().'admin/report/menu_favorite', lang('favorite_list_report')) ?>
            <?php echo _load_menu($this->uri->segment(3), 'traffic_pelanggan', ['nav-link', 'fas fa-money-check-alt'], base_url().'admin/report/traffic_pelanggan', lang('traffic_page_report')) ?>
            <?php echo _load_menu($this->uri->segment(3), 'debt', ['nav-link', 'fas fa-money-check-alt'], base_url().'admin/report/debt', lang('debt_page_report')) ?>
            <?php endif; ?>
            <li></li>
        </ul>
    </aside>
</div>
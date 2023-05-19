      <!-- Menu saidbare de gauche -->
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
                <p>logo</p>
                <span class=" demo menu-text fw-bolder ms-2" style="font-size:20px;">G-BUDGET</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
                <!-- Dashboard -->
                <li class="menu-item active">
                <a href="index.php" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Dashboard</div>
                </a>
                </li>
                <!-- Layouts -->
                <li class="menu-sub">

                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-layout"></i>
                    <div data-i18n="Layouts">GESTION REVENU</div>
                </a>

                <ul class="menu-sub">

                    <li class="menu-item">
                    <a href="{{ route('medecin.creneaux.create') }}" class="menu-link">
                        <div data-i18n="Without menu">Ajouter un revenu</div>
                    </a>
                    </li>
                    <li class="menu-item">
                    <a href="" class="menu-link">
                        <div data-i18n="Without navbar">Historique des revenus</div>
                    </a>
                    </li>
                
                </ul>
                </li>

                
                <li class="menu-item">

                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-dock-top"></i>
                    <div data-i18n="Account Settings">GESTION DEPENSE</div>
                </a>

                <ul class="menu-sub">

                    <li class="menu-item">
                    <a href="depense.php" class="menu-link">
                        <div data-i18n="Account">Enregistrer une depense</div>
                    </a>
                    </li>
                    <li class="menu-item">
                    <a href="historiqueDepense.php" class="menu-link">
                        <div data-i18n="Notifications">Historique des depenses</div>
                    </a>
                    </li>

                </ul>

                </li>
                
            </ul>
        </aside>
        <!-- / Menu -->
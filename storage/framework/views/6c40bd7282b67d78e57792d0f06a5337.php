<!-- APPLICANT SIDEBAR (Media Practitioner + Media House) -->
<?php
  $isAccred = request()->routeIs('accreditation.*') || str_contains(request()->path(), 'portal/accreditation');
  $isMedia  = request()->routeIs('mediahouse.*') || str_contains(request()->path(), 'media-house/registration');

  $subTitle = $isAccred
    ? 'Media Practitioner Accreditation'
    : 'Mass Media Service Registration';
?>

<div class="vertical-menu">
  <div class="navbar-brand-box">
    <img src="<?php echo e(asset('zmc_logo.png')); ?>" alt="ZMC Logo">
    <div>
      <span class="logo-text"><span class="zimbabwe">ZIMBABWE</span> <span class="media">MEDIA</span> <span class="commission">COMMISSION</span></span>
      <span class="logo-sub"><?php echo e($subTitle); ?></span>
    </div>
  </div>

  <ul class="sidebar-menu">

    <?php if($isAccred): ?>
      <li class="<?php echo e(request()->routeIs('accreditation.home') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('accreditation.home')); ?>">
          <i class="ri-home-4-line"></i><span>Dashboard</span>
        </a>
      </li>

      <li class="<?php echo e(request()->routeIs('accreditation.new') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('accreditation.new')); ?>">
          <i class="ri-file-add-line"></i><span>New Accreditation (AP3)</span>
        </a>
      </li>

      <li class="<?php echo e(request()->routeIs('accreditation.renewals') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('accreditation.renewals')); ?>">
          <i class="ri-refresh-line"></i><span>Renewal / Replacement (AP5)</span>
        </a>
      </li>

      <li class="<?php echo e(request()->routeIs('accreditation.payments') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('accreditation.payments')); ?>">
          <i class="ri-bank-card-line"></i><span>Payment History</span>
        </a>
      </li>

      <li class="<?php echo e(request()->routeIs('accreditation.notices') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('accreditation.notices')); ?>">
          <i class="ri-megaphone-line"></i><span>Notices & Events</span>
        </a>
      </li>

      <li class="<?php echo e(request()->routeIs('accreditation.downloads*') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('accreditation.downloads')); ?>">
          <i class="ri-download-2-line"></i><span>Downloads</span>
        </a>
      </li>

      <li class="<?php echo e(request()->routeIs('accreditation.requirements') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('accreditation.requirements')); ?>">
          <i class="ri-list-check-2"></i><span>Requirements</span>
        </a>
      </li>

      <li class="<?php echo e(request()->routeIs('accreditation.howto') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('accreditation.howto')); ?>">
          <i class="ri-information-line"></i><span>How it Works</span>
        </a>
      </li>

      <li>
        <a href="#" target="_blank">
          <i class="ri-global-line"></i><span>Media Hub</span>
        </a>
      </li>

      <li class="<?php echo e(request()->routeIs('accreditation.profile') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('accreditation.profile')); ?>">
          <i class="ri-user-line"></i><span>Profile</span>
        </a>
      </li>

      <li class="<?php echo e(request()->routeIs('accreditation.settings') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('accreditation.settings')); ?>">
          <i class="ri-settings-3-line"></i><span>Settings</span>
        </a>
      </li>

    <?php elseif($isMedia): ?>

      <li class="<?php echo e(request()->routeIs('mediahouse.portal') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('mediahouse.portal')); ?>">
          <i class="ri-home-4-line"></i><span>Dashboard</span>
        </a>
      </li>

      <li class="<?php echo e(request()->routeIs('mediahouse.new') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('mediahouse.new')); ?>">
          <i class="ri-file-add-line"></i><span>New Registration (AP1)</span>
        </a>
      </li>

      <li class="<?php echo e(request()->routeIs('mediahouse.renewals') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('mediahouse.renewals')); ?>">
          <i class="ri-refresh-line"></i><span>Renewal / Replacement (AP5)</span>
        </a>
      </li>

      <li class="<?php echo e(request()->routeIs('mediahouse.payments') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('mediahouse.payments')); ?>">
          <i class="ri-bank-card-line"></i><span>Payment History</span>
        </a>
      </li>

      <li class="<?php echo e(request()->routeIs('mediahouse.notices') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('mediahouse.notices')); ?>">
          <i class="ri-megaphone-line"></i><span>Notices & Events</span>
        </a>
      </li>

      <li class="<?php echo e(request()->routeIs('mediahouse.downloads*') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('mediahouse.downloads')); ?>">
          <i class="ri-download-2-line"></i><span>Downloads</span>
        </a>
      </li>

      <li class="<?php echo e(request()->routeIs('mediahouse.requirements') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('mediahouse.requirements')); ?>">
          <i class="ri-list-check-2"></i><span>Requirements</span>
        </a>
      </li>

      <li class="<?php echo e(request()->routeIs('mediahouse.howto') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('mediahouse.howto')); ?>">
          <i class="ri-information-line"></i><span>How it Works</span>
        </a>
      </li>

      <li>
        <a href="#" target="_blank">
          <i class="ri-global-line"></i><span>Media Hub</span>
        </a>
      </li>

      <li class="<?php echo e(request()->routeIs('mediahouse.profile') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('mediahouse.profile')); ?>">
          <i class="ri-building-2-line"></i><span>Organization Profile</span>
        </a>
      </li>

      <li class="<?php echo e(request()->routeIs('mediahouse.settings') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('mediahouse.settings')); ?>">
          <i class="ri-settings-3-line"></i><span>Settings</span>
        </a>
      </li>
    <?php endif; ?>

    
  </ul>

  <div class="sidebar-user">
    <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode(Auth::user()->name ?? 'User')); ?>&background=facc15&color=000" alt="user">
    <div style="line-height:1.1;">
      <div style="font-weight:700;font-size:13px;color:#fff;">
        <?php echo e(Auth::user()->name ?? 'User'); ?>

      </div>
      <div style="font-size:11px;color:rgba(255,255,255,0.7);">Applicant Portal</div>
    </div>
  </div>
</div>
<?php /**PATH /home/runner/workspace/resources/views/layouts/sidebar.blade.php ENDPATH**/ ?>
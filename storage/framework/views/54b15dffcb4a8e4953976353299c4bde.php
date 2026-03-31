 
 <?php $__env->startSection('title', 'Login Activity'); ?>
 
 <?php $__env->startSection('content'); ?>
 <div class="container-fluid py-3">
   <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
     <div>
       <h4 class="fw-bold mb-0">Login Activity</h4>
       <div class="text-muted" style="font-size:13px;">Detailed login history and session tracking.</div>
     </div>
     <form class="d-flex gap-2" method="GET" action="<?php echo e(route('admin.users.login_activity')); ?>">
       <input class="form-control form-control-sm" name="q" value="<?php echo e($q); ?>" placeholder="Search (email, IP, machine...)" style="width:260px;"/>
       <button class="btn btn-sm btn-primary">Search</button>
     </form>
   </div>
 
   <div class="row g-3">
     <div class="col-lg-12">
       <div class="card border-0 shadow-sm">
         <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <span class="fw-semibold">Successful Logins</span>
            <span class="badge bg-success-subtle text-success"><?php echo e($lastLogins->total()); ?> total records</span>
         </div>
         <div class="card-body p-0">
           <div class="table-responsive">
             <table class="table table-sm mb-0 align-middle">
               <thead class="table-light">
                 <tr>
                   <th>Date</th>
                   <th>User</th>
                   <th>IP Address</th>
                   <th>Machine / Device</th>
                   <th>OS</th>
                   <th>Browser</th>
                 </tr>
               </thead>
               <tbody>
                 <?php $__empty_1 = true; $__currentLoopData = $lastLogins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                   <tr>
                     <td class="text-nowrap"><?php echo e($l->login_at?->format('Y-m-d H:i')); ?></td>
                     <td>
                        <div class="fw-semibold"><?php echo e($l->user?->name ?? 'Unknown'); ?></div>
                        <div class="small text-muted"><?php echo e($l->account_name); ?></div>
                     </td>
                     <td class="text-nowrap"><?php echo e($l->ip_address); ?></td>
                     <td class="text-nowrap"><?php echo e($l->device_identifier); ?></td>
                     <td class="text-nowrap">
                        <i class="<?php echo e(str_contains(strtolower($l->operating_system), 'win') ? 'ri-windows-fill' : (str_contains(strtolower($l->operating_system), 'mac') ? 'ri-apple-fill' : 'ri-terminal-box-line')); ?> me-1"></i>
                        <?php echo e($l->operating_system); ?>

                     </td>
                     <td class="text-nowrap">
                        <i class="ri-chrome-line me-1"></i>
                        <?php echo e($l->browser_name); ?> <span class="text-muted" style="font-size:11px;">v<?php echo e($l->browser_version); ?></span>
                     </td>
                   </tr>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                   <tr><td colspan="6" class="text-center text-muted py-3">No login activity found.</td></tr>
                 <?php endif; ?>
               </tbody>
             </table>
           </div>
         </div>
         <div class="card-footer bg-white"><?php echo e($lastLogins->links()); ?></div>
       </div>
     </div>
 
     <div class="col-lg-8">
       <div class="card border-0 shadow-sm">
         <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <span class="fw-semibold">Failed Login Attempts</span>
            <span class="badge bg-danger-subtle text-danger"><?php echo e($failedLogins->total()); ?> attempts</span>
         </div>
         <div class="card-body p-0">
           <div class="table-responsive">
             <table class="table table-sm mb-0 align-middle">
               <thead class="table-light">
                 <tr>
                   <th>Date</th>
                   <th>Account</th>
                   <th>IP</th>
                   <th>Reason</th>
                 </tr>
               </thead>
               <tbody>
                 <?php $__empty_1 = true; $__currentLoopData = $failedLogins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                   <tr>
                     <td class="text-nowrap"><?php echo e($l->login_at?->format('Y-m-d H:i')); ?></td>
                     <td><?php echo e($l->account_name); ?></td>
                     <td class="text-nowrap"><?php echo e($l->ip_address); ?></td>
                     <td><span class="badge bg-danger-subtle text-danger"><?php echo e($l->failure_reason); ?></span></td>
                   </tr>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                   <tr><td colspan="4" class="text-center text-muted py-3">No failed logins found.</td></tr>
                 <?php endif; ?>
               </tbody>
             </table>
           </div>
         </div>
         <div class="card-footer bg-white"><?php echo e($failedLogins->links()); ?></div>
       </div>
     </div>
 
     <div class="col-lg-4">
       <div class="card border-0 shadow-sm">
         <div class="card-header bg-white fw-semibold">Last Active (Last 30 Days)</div>
         <div class="card-body p-0">
           <div class="table-responsive">
             <table class="table table-sm mb-0">
               <thead class="table-light"><tr><th>User</th><th>Last Login</th></tr></thead>
               <tbody>
                 <?php $__empty_1 = true; $__currentLoopData = $lastActive; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                   <tr>
                     <td>
                        <div class="fw-semibold"><?php echo e($row['user']?->name ?? 'User #'.$row['user']?->id); ?></div>
                        <div class="text-muted small"><?php echo e($row['user']?->email); ?></div>
                     </td>
                     <td class="text-nowrap"><?php echo e(\Carbon\Carbon::parse($row['last_seen'])->format('Y-m-d H:i')); ?></td>
                   </tr>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                   <tr><td colspan="2" class="text-center text-muted py-3">No recent activity.</td></tr>
                 <?php endif; ?>
               </tbody>
             </table>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/admin/users/login_activity.blade.php ENDPATH**/ ?>
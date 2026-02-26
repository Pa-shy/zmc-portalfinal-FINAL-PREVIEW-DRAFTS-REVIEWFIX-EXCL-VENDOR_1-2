<?php $__env->startSection('title','Notices & Events'); ?>
<?php $__env->startSection('content'); ?>
<div class="zmc-dashboard-wrapper" style="font-family:'Roboto', sans-serif; color:#334155;">
  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
    <div>
      <h4 class="fw-bold m-0" style="font-size:22px; color:#1e293b;">Notices & Events</h4>
      <div class="text-muted mt-1" style="font-size:13px;">
        Manage public announcements for Media Practitioner Accreditation Portal and Media House Registration Portal.
      </div>
    </div>
  </div>

  <?php if(session('success')): ?>
    <div class="alert alert-success d-flex align-items-start gap-2">
      <i class="ri-checkbox-circle-line" style="font-size:18px;line-height:1;"></i>
      <div><?php echo e(session('success')); ?></div>
    </div>
  <?php endif; ?>

  <div class="row g-3">
    
    <div class="col-12 col-lg-6">
      <div class="zmc-card h-100">
        <div class="d-flex justify-content-between align-items-center mb-2">
          <h6 class="fw-bold m-0"><i class="ri-megaphone-line me-2" style="color:var(--zmc-accent)"></i>Notices</h6>
          <?php if (\Illuminate\Support\Facades\Blade::check('hasanyrole', 'super_admin|it_admin')): ?>
            <button class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#createNotice"><i class="ri-add-line me-1"></i>New</button>
          <?php endif; ?>
        </div>
        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0 zmc-mini-table">
            <thead><tr><th>Title</th><th>Portal</th><th>Status</th><th class="text-end">Action</th></tr></thead>
            <tbody>
            <?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td class="fw-bold">
                  <?php if($n->image_path): ?>
                    <img src="<?php echo e(asset('storage/' . $n->image_path)); ?>" alt="" class="rounded me-2" style="width:32px;height:32px;object-fit:cover;vertical-align:middle;">
                  <?php endif; ?>
                  <?php echo e($n->title); ?>

                </td>
                <td class="small text-muted text-uppercase"><?php echo e($n->target_portal); ?></td>
                <td>
                  <span class="badge rounded-pill bg-<?php echo e($n->is_published ? 'success' : 'secondary'); ?> px-3"><?php echo e($n->is_published ? 'Published' : 'Draft'); ?></span>
                </td>
                <td class="text-end">
                  <?php if (\Illuminate\Support\Facades\Blade::check('hasanyrole', 'super_admin|it_admin')): ?>
                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editNotice<?php echo e($n->id); ?>"><i class="ri-edit-line"></i></button>
                    <form method="POST" action="<?php echo e(route('staff.it.notices.destroy',$n)); ?>" class="d-inline"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                      <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this notice?')"><i class="ri-delete-bin-line"></i></button>
                    </form>
                  <?php else: ?>
                    —
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
        <div class="mt-3"><?php echo e($notices->links()); ?></div>
      </div>
    </div>

    
    <div class="col-12 col-lg-6">
      <div class="zmc-card h-100">
        <div class="d-flex justify-content-between align-items-center mb-2">
          <h6 class="fw-bold m-0"><i class="ri-calendar-event-line me-2" style="color:var(--zmc-accent)"></i>Events</h6>
          <?php if (\Illuminate\Support\Facades\Blade::check('hasanyrole', 'super_admin|it_admin')): ?>
            <button class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#createEvent"><i class="ri-add-line me-1"></i>New</button>
          <?php endif; ?>
        </div>
        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0 zmc-mini-table">
            <thead><tr><th>Title</th><th>Date</th><th>Status</th><th class="text-end">Action</th></tr></thead>
            <tbody>
            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td class="fw-bold">
                  <?php if($e->image_path): ?>
                    <img src="<?php echo e(asset('storage/' . $e->image_path)); ?>" alt="" class="rounded me-2" style="width:32px;height:32px;object-fit:cover;vertical-align:middle;">
                  <?php endif; ?>
                  <?php echo e($e->title); ?>

                </td>
                <td class="small"><?php echo e(optional($e->starts_at)->format('d M Y') ?? '—'); ?></td>
                <td>
                  <span class="badge rounded-pill bg-<?php echo e($e->is_published ? 'success' : 'secondary'); ?> px-3"><?php echo e($e->is_published ? 'Published' : 'Draft'); ?></span>
                </td>
                <td class="text-end">
                  <?php if (\Illuminate\Support\Facades\Blade::check('hasanyrole', 'super_admin|it_admin')): ?>
                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editEvent<?php echo e($e->id); ?>"><i class="ri-edit-line"></i></button>
                    <form method="POST" action="<?php echo e(route('staff.it.events.destroy',$e)); ?>" class="d-inline"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                      <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this event?')"><i class="ri-delete-bin-line"></i></button>
                    </form>
                  <?php else: ?>
                    —
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
        <div class="mt-3"><?php echo e($events->links()); ?></div>
      </div>
    </div>

    
    <div class="col-12 col-lg-6">
      <div class="zmc-card h-100">
        <div class="d-flex justify-content-between align-items-center mb-2">
          <h6 class="fw-bold m-0"><i class="ri-id-card-line me-2" style="color:var(--zmc-accent)"></i>Vacancies</h6>
          <?php if (\Illuminate\Support\Facades\Blade::check('hasanyrole', 'super_admin|it_admin')): ?>
            <button class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#createVacancy"><i class="ri-add-line me-1"></i>New</button>
          <?php endif; ?>
        </div>
        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0 zmc-mini-table">
            <thead><tr><th>Title</th><th>Closing</th><th>Status</th><th class="text-end">Action</th></tr></thead>
            <tbody>
            <?php $__currentLoopData = $vacancies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td class="fw-bold"><?php echo e($v->title); ?></td>
                <td class="small"><?php echo e(optional($v->closing_at)->format('d M Y') ?? '—'); ?></td>
                <td>
                  <span class="badge rounded-pill bg-<?php echo e($v->is_published ? 'success' : 'secondary'); ?> px-3"><?php echo e($v->is_published ? 'Published' : 'Draft'); ?></span>
                </td>
                <td class="text-end">
                  <?php if (\Illuminate\Support\Facades\Blade::check('hasanyrole', 'super_admin|it_admin')): ?>
                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editVacancy<?php echo e($v->id); ?>"><i class="ri-edit-line"></i></button>
                    <form method="POST" action="<?php echo e(route('staff.it.vacancies.destroy',$v)); ?>" class="d-inline"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                      <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this vacancy?')"><i class="ri-delete-bin-line"></i></button>
                    </form>
                  <?php else: ?>
                    —
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
        <div class="mt-3"><?php echo e($vacancies->links()); ?></div>
      </div>
    </div>

    
    <div class="col-12 col-lg-6">
      <div class="zmc-card h-100">
        <div class="d-flex justify-content-between align-items-center mb-2">
          <h6 class="fw-bold m-0"><i class="ri-briefcase-line me-2" style="color:var(--zmc-accent)"></i>Tenders</h6>
          <?php if (\Illuminate\Support\Facades\Blade::check('hasanyrole', 'super_admin|it_admin')): ?>
            <button class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#createTender"><i class="ri-add-line me-1"></i>New</button>
          <?php endif; ?>
        </div>
        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0 zmc-mini-table">
            <thead><tr><th>Title</th><th>Closing</th><th>Status</th><th class="text-end">Action</th></tr></thead>
            <tbody>
            <?php $__currentLoopData = $tenders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td class="fw-bold"><?php echo e($t->title); ?></td>
                <td class="small"><?php echo e(optional($t->closing_at)->format('d M Y') ?? '—'); ?></td>
                <td>
                  <span class="badge rounded-pill bg-<?php echo e($t->is_published ? 'success' : 'secondary'); ?> px-3"><?php echo e($t->is_published ? 'Published' : 'Draft'); ?></span>
                </td>
                <td class="text-end">
                  <?php if (\Illuminate\Support\Facades\Blade::check('hasanyrole', 'super_admin|it_admin')): ?>
                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editTender<?php echo e($t->id); ?>"><i class="ri-edit-line"></i></button>
                    <form method="POST" action="<?php echo e(route('staff.it.tenders.destroy',$t)); ?>" class="d-inline"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                      <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this tender?')"><i class="ri-delete-bin-line"></i></button>
                    </form>
                  <?php else: ?>
                    —
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
        <div class="mt-3"><?php echo e($tenders->links()); ?></div>
      </div>
    </div>
  </div>
</div>

<?php if (\Illuminate\Support\Facades\Blade::check('hasanyrole', 'super_admin|it_admin')): ?>

<div class="modal fade" id="createNotice" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <form class="modal-content" method="POST" enctype="multipart/form-data" action="<?php echo e(Route::has('admin.content.notices.store') ? route('admin.content.notices.store') : route('content.notices.store')); ?>">
      <?php echo csrf_field(); ?>
      <div class="modal-header zmc-modal-header"><div class="zmc-modal-title">Create Notice</div><button class="btn-close" data-bs-dismiss="modal"></button></div>
      <div class="modal-body">
        <div class="row g-3">
          <div class="col-12"><label class="form-label zmc-lbl">Title</label><input class="form-control zmc-input" name="title" required></div>
          <div class="col-12"><label class="form-label zmc-lbl">Body</label><textarea class="form-control zmc-input" rows="5" name="body" required></textarea></div>
          <div class="col-12 col-md-6"><label class="form-label zmc-lbl">Image (optional)</label><input class="form-control zmc-input" type="file" name="image" accept="image/*"></div>
          <div class="col-12 col-md-6"><label class="form-label zmc-lbl">Attachment (optional)</label><input class="form-control zmc-input" type="file" name="attachment" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.txt,image/*"></div>
          <div class="col-12 col-md-6"><label class="form-label zmc-lbl">Portal</label>
            <select class="form-select zmc-input" name="target_portal" required>
              <option value="both">Both</option><option value="journalist">Media Practitioner</option><option value="mediahouse">Media House</option>
            </select>
          </div>
          <div class="col-12 col-md-6 d-flex align-items-end">
            <div class="form-check"><input class="form-check-input" type="checkbox" name="is_published" value="1" checked id="n_pub"><label class="form-check-label" for="n_pub">Publish</label></div>
          </div>
        </div>
      </div>
      <div class="modal-footer zmc-modal-footer"><button class="btn btn-light" data-bs-dismiss="modal" type="button">Cancel</button><button class="btn btn-dark" type="submit">Save</button></div>
    </form>
  </div>
</div>




<div class="modal fade" id="createEvent" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <form class="modal-content" method="POST" enctype="multipart/form-data" action="<?php echo e(Route::has('admin.content.events.store') ? route('admin.content.events.store') : route('content.events.store')); ?>">
      <?php echo csrf_field(); ?>
      <div class="modal-header zmc-modal-header"><div class="zmc-modal-title">Create Event</div><button class="btn-close" data-bs-dismiss="modal"></button></div>
      <div class="modal-body">
        <div class="row g-3">
          <div class="col-12"><label class="form-label zmc-lbl">Title</label><input class="form-control zmc-input" name="title" required></div>
          <div class="col-12"><label class="form-label zmc-lbl">Description</label><textarea class="form-control zmc-input" rows="4" name="description"></textarea></div>
          <div class="col-12 col-md-6"><label class="form-label zmc-lbl">Image (optional)</label><input class="form-control zmc-input" type="file" name="image" accept="image/*"></div>
          <div class="col-12 col-md-6"><label class="form-label zmc-lbl">Attachment (optional)</label><input class="form-control zmc-input" type="file" name="attachment" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.txt,image/*"></div>
          <div class="col-12 col-md-6"><label class="form-label zmc-lbl">Location</label><input class="form-control zmc-input" name="location"></div>
          <div class="col-12 col-md-3"><label class="form-label zmc-lbl">Starts</label><input class="form-control zmc-input" type="datetime-local" name="starts_at"></div>
          <div class="col-12 col-md-3"><label class="form-label zmc-lbl">Ends</label><input class="form-control zmc-input" type="datetime-local" name="ends_at"></div>
          <div class="col-12 col-md-6"><label class="form-label zmc-lbl">Portal</label>
            <select class="form-select zmc-input" name="target_portal" required>
              <option value="both">Both</option><option value="journalist">Media Practitioner</option><option value="mediahouse">Media House</option>
            </select>
          </div>
          <div class="col-12 col-md-6 d-flex align-items-end">
            <div class="form-check"><input class="form-check-input" type="checkbox" name="is_published" value="1" checked id="e_pub"><label class="form-check-label" for="e_pub">Publish</label></div>
          </div>
        </div>
      </div>
      <div class="modal-footer zmc-modal-footer"><button class="btn btn-light" data-bs-dismiss="modal" type="button">Cancel</button><button class="btn btn-dark" type="submit">Save</button></div>
    </form>
  </div>
</div>




<?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="editNotice<?php echo e($n->id); ?>" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <form class="modal-content" method="POST" enctype="multipart/form-data" action="<?php echo e(route('staff.it.notices.update',$n)); ?>">
      <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
      <div class="modal-header zmc-modal-header"><div class="zmc-modal-title">Edit Notice</div><button class="btn-close" data-bs-dismiss="modal"></button></div>
      <div class="modal-body">
        <div class="row g-3">
          <div class="col-12"><label class="form-label zmc-lbl">Title</label><input class="form-control zmc-input" name="title" value="<?php echo e($n->title); ?>" required></div>
          <div class="col-12"><label class="form-label zmc-lbl">Body</label><textarea class="form-control zmc-input" rows="5" name="body" required><?php echo e($n->body); ?></textarea></div>
          <div class="col-12 col-md-6">
            <label class="form-label zmc-lbl">Replace Image (optional)</label>
            <input class="form-control zmc-input" type="file" name="image" accept="image/*">
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label zmc-lbl">Replace Attachment (optional)</label>
            <input class="form-control zmc-input" type="file" name="attachment" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.txt,image/*">
          </div>
          <div class="col-12 col-md-6"><label class="form-label zmc-lbl">Portal</label>
            <select class="form-select zmc-input" name="target_portal" required>
              <option value="both" <?php if($n->target_portal==='both'): echo 'selected'; endif; ?>>Both</option>
              <option value="journalist" <?php if($n->target_portal==='journalist'): echo 'selected'; endif; ?>>Media Practitioner</option>
              <option value="mediahouse" <?php if($n->target_portal==='mediahouse'): echo 'selected'; endif; ?>>Media House</option>
            </select>
          </div>
          <div class="col-12 col-md-6 d-flex align-items-end">
            <div class="form-check"><input class="form-check-input" type="checkbox" name="is_published" value="1" <?php if($n->is_published): echo 'checked'; endif; ?> id="n_pub<?php echo e($n->id); ?>"><label class="form-check-label" for="n_pub<?php echo e($n->id); ?>">Publish</label></div>
          </div>
        </div>
      </div>
      <div class="modal-footer zmc-modal-footer"><button class="btn btn-light" data-bs-dismiss="modal" type="button">Cancel</button><button class="btn btn-dark" type="submit">Save</button></div>
    </form>
  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="editEvent<?php echo e($e->id); ?>" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <form class="modal-content" method="POST" enctype="multipart/form-data" action="<?php echo e(route('staff.it.events.update',$e)); ?>">
      <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
      <div class="modal-header zmc-modal-header"><div class="zmc-modal-title">Edit Event</div><button class="btn-close" data-bs-dismiss="modal"></button></div>
      <div class="modal-body">
        <div class="row g-3">
          <div class="col-12"><label class="form-label zmc-lbl">Title</label><input class="form-control zmc-input" name="title" value="<?php echo e($e->title); ?>" required></div>
          <div class="col-12"><label class="form-label zmc-lbl">Description</label><textarea class="form-control zmc-input" rows="4" name="description"><?php echo e($e->description); ?></textarea></div>
          <div class="col-12 col-md-6"><label class="form-label zmc-lbl">Location</label><input class="form-control zmc-input" name="location" value="<?php echo e($e->location); ?>"></div>
          <div class="col-12 col-md-3"><label class="form-label zmc-lbl">Starts</label><input class="form-control zmc-input" type="datetime-local" name="starts_at" value="<?php echo e(optional($e->starts_at)->format('Y-m-d\TH:i')); ?>"></div>
          <div class="col-12 col-md-3"><label class="form-label zmc-lbl">Ends</label><input class="form-control zmc-input" type="datetime-local" name="ends_at" value="<?php echo e(optional($e->ends_at)->format('Y-m-d\TH:i')); ?>"></div>
          <div class="col-12 col-md-6"><label class="form-label zmc-lbl">Replace Image (optional)</label><input class="form-control zmc-input" type="file" name="image" accept="image/*"></div>
          <div class="col-12 col-md-6"><label class="form-label zmc-lbl">Replace Attachment (optional)</label><input class="form-control zmc-input" type="file" name="attachment" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.txt,image/*"></div>
          <div class="col-12 col-md-6"><label class="form-label zmc-lbl">Portal</label>
            <select class="form-select zmc-input" name="target_portal" required>
              <option value="both" <?php if($e->target_portal==='both'): echo 'selected'; endif; ?>>Both</option>
              <option value="journalist" <?php if($e->target_portal==='journalist'): echo 'selected'; endif; ?>>Media Practitioner</option>
              <option value="mediahouse" <?php if($e->target_portal==='mediahouse'): echo 'selected'; endif; ?>>Media House</option>
            </select>
          </div>
          <div class="col-12 col-md-6 d-flex align-items-end">
            <div class="form-check"><input class="form-check-input" type="checkbox" name="is_published" value="1" <?php if($e->is_published): echo 'checked'; endif; ?> id="e_pub<?php echo e($e->id); ?>"><label class="form-check-label" for="e_pub<?php echo e($e->id); ?>">Publish</label></div>
          </div>
        </div>
      </div>
      <div class="modal-footer zmc-modal-footer"><button class="btn btn-light" data-bs-dismiss="modal" type="button">Cancel</button><button class="btn btn-dark" type="submit">Save</button></div>
    </form>
  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<div class="modal fade" id="createVacancy" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <form class="modal-content" method="POST" enctype="multipart/form-data" action="<?php echo e(route('staff.it.vacancies.store')); ?>">
      <?php echo csrf_field(); ?>
      <div class="modal-header zmc-modal-header"><div class="zmc-modal-title">New Vacancy</div><button class="btn-close" data-bs-dismiss="modal"></button></div>
      <div class="modal-body">
        <div class="row g-3">
          <div class="col-12"><label class="form-label zmc-lbl">Title</label><input class="form-control zmc-input" name="title" required></div>
          <div class="col-12"><label class="form-label zmc-lbl">Description / Body</label><textarea class="form-control zmc-input" rows="5" name="body" required></textarea></div>
          <div class="col-12 col-md-6"><label class="form-label zmc-lbl">Closing Date</label><input class="form-control zmc-input" type="date" name="closing_at"></div>
          <div class="col-12 col-md-3"><label class="form-label zmc-lbl">Image</label><input class="form-control zmc-input" type="file" name="image" accept="image/*"></div>
          <div class="col-12 col-md-3"><label class="form-label zmc-lbl">Attachment</label><input class="form-control zmc-input" type="file" name="attachment"></div>
          <div class="col-12 d-flex align-items-end">
            <div class="form-check"><input class="form-check-input" type="checkbox" name="is_published" value="1" checked id="v_pub"><label class="form-check-label" for="v_pub">Publish Immediately</label></div>
          </div>
        </div>
      </div>
      <div class="modal-footer zmc-modal-footer"><button class="btn btn-light" data-bs-dismiss="modal" type="button">Cancel</button><button class="btn btn-dark" type="submit">Save Vacancy</button></div>
    </form>
  </div>
</div>

<?php $__currentLoopData = $vacancies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="editVacancy<?php echo e($v->id); ?>" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <form class="modal-content" method="POST" enctype="multipart/form-data" action="<?php echo e(route('staff.it.vacancies.update',$v)); ?>">
      <?php echo csrf_field(); ?> <?php echo method_field('POST'); ?> 
      <div class="modal-header zmc-modal-header"><div class="zmc-modal-title">Edit Vacancy</div><button class="btn-close" data-bs-dismiss="modal"></button></div>
      <div class="modal-body">
        <div class="row g-3">
          <div class="col-12"><label class="form-label zmc-lbl">Title</label><input class="form-control zmc-input" name="title" value="<?php echo e($v->title); ?>" required></div>
          <div class="col-12"><label class="form-label zmc-lbl">Description</label><textarea class="form-control zmc-input" rows="5" name="body" required><?php echo e($v->body); ?></textarea></div>
          <div class="col-12 col-md-6"><label class="form-label zmc-lbl">Closing Date</label><input class="form-control zmc-input" type="date" name="closing_at" value="<?php echo e(optional($v->closing_at)->format('Y-m-d')); ?>"></div>
          <div class="col-12 col-md-3"><label class="form-label zmc-lbl">Replace Image</label><input class="form-control zmc-input" type="file" name="image" accept="image/*"></div>
          <div class="col-12 col-md-3"><label class="form-label zmc-lbl">Replace Attachment</label><input class="form-control zmc-input" type="file" name="attachment"></div>
          <div class="col-12 d-flex align-items-end">
            <div class="form-check"><input class="form-check-input" type="checkbox" name="is_published" value="1" <?php if($v->is_published): echo 'checked'; endif; ?> id="v_pub<?php echo e($v->id); ?>"><label class="form-check-label" for="v_pub<?php echo e($v->id); ?>">Published</label></div>
          </div>
        </div>
      </div>
      <div class="modal-footer zmc-modal-footer"><button class="btn btn-light" data-bs-dismiss="modal" type="button">Cancel</button><button class="btn btn-dark" type="submit">Update Vacancy</button></div>
    </form>
  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<div class="modal fade" id="createTender" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <form class="modal-content" method="POST" enctype="multipart/form-data" action="<?php echo e(route('staff.it.tenders.store')); ?>">
      <?php echo csrf_field(); ?>
      <div class="modal-header zmc-modal-header"><div class="zmc-modal-title">New Tender</div><button class="btn-close" data-bs-dismiss="modal"></button></div>
      <div class="modal-body">
        <div class="row g-3">
          <div class="col-12"><label class="form-label zmc-lbl">Title / Tender Ref</label><input class="form-control zmc-input" name="title" required></div>
          <div class="col-12"><label class="form-label zmc-lbl">Description</label><textarea class="form-control zmc-input" rows="5" name="description" required></textarea></div>
          <div class="col-12 col-md-6"><label class="form-label zmc-lbl">Closing Date</label><input class="form-control zmc-input" type="date" name="closing_at"></div>
          <div class="col-12 col-md-6"><label class="form-label zmc-lbl">Document Attachment</label><input class="form-control zmc-input" type="file" name="attachment"></div>
          <div class="col-12 d-flex align-items-end">
            <div class="form-check"><input class="form-check-input" type="checkbox" name="is_published" value="1" checked id="t_pub"><label class="form-check-label" for="t_pub">Publish Immediately</label></div>
          </div>
        </div>
      </div>
      <div class="modal-footer zmc-modal-footer"><button class="btn btn-light" data-bs-dismiss="modal" type="button">Cancel</button><button class="btn btn-dark" type="submit">Save Tender</button></div>
    </form>
  </div>
</div>

<?php $__currentLoopData = $tenders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="editTender<?php echo e($t->id); ?>" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <form class="modal-content" method="POST" enctype="multipart/form-data" action="<?php echo e(route('staff.it.tenders.update',$t)); ?>">
      <?php echo csrf_field(); ?> <?php echo method_field('POST'); ?>
      <div class="modal-header zmc-modal-header"><div class="zmc-modal-title">Edit Tender</div><button class="btn-close" data-bs-dismiss="modal"></button></div>
      <div class="modal-body">
        <div class="row g-3">
          <div class="col-12"><label class="form-label zmc-lbl">Title / Tender Ref</label><input class="form-control zmc-input" name="title" value="<?php echo e($t->title); ?>" required></div>
          <div class="col-12"><label class="form-label zmc-lbl">Description</label><textarea class="form-control zmc-input" rows="5" name="description" required><?php echo e($t->description); ?></textarea></div>
          <div class="col-12 col-md-6"><label class="form-label zmc-lbl">Closing Date</label><input class="form-control zmc-input" type="date" name="closing_at" value="<?php echo e(optional($t->closing_at)->format('Y-m-d')); ?>"></div>
          <div class="col-12 col-md-6"><label class="form-label zmc-lbl">Replace Attachment</label><input class="form-control zmc-input" type="file" name="attachment"></div>
          <div class="col-12 d-flex align-items-end">
            <div class="form-check"><input class="form-check-input" type="checkbox" name="is_published" value="1" <?php if($t->is_published): echo 'checked'; endif; ?> id="t_pub<?php echo e($t->id); ?>"><label class="form-check-label" for="t_pub<?php echo e($t->id); ?>">Published</label></div>
          </div>
        </div>
      </div>
      <div class="modal-footer zmc-modal-footer"><button class="btn btn-light" data-bs-dismiss="modal" type="button">Cancel</button><button class="btn btn-dark" type="submit">Update Tender</button></div>
    </form>
  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.portal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/runner/workspace/resources/views/admin/content/index.blade.php ENDPATH**/ ?>
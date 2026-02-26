<?php

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/adminlte/darkmode/toggle' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'adminlte.darkmode.toggle',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sanctum/csrf-cookie' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sanctum.csrf-cookie',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/up' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::M4DQ1j3w32gDA7jZ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/health' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'system.health',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'public.home',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/choose-portal' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'public.choose_portal',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.entry',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/select-role' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.select_role',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'staff.choose_role',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'staff.login.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'auth.login.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/signup' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'register',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'auth.register.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/forgot-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.request',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'password.email',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reset-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/paynow/callback' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'paynow.callback',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/paynow/return' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'paynow.return',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/external-content' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.v1.external-content',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'settings',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/settings/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'settings.profile',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/settings/password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'settings.password',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/settings/theme' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'settings.theme',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/settings/theme/ajax' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'settings.theme.ajax',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/settings/security' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'settings.security',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/settings/notifications' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'settings.notifications',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/home' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'home',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/portal' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'portal',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/portal/accreditation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'accreditation.portal',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/portal/accreditation/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'accreditation.home',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/portal/accreditation/new' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'accreditation.new',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/portal/accreditation/save-draft' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'accreditation.saveDraft',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/portal/accreditation/submit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'accreditation.submit',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/portal/accreditation/renewals' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'accreditation.renewals',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/portal/accreditation/renewals/save-draft' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'accreditation.renewals.saveDraft',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/portal/accreditation/renewals/submit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'accreditation.submitAp5',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/portal/accreditation/payments' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'accreditation.payments',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/portal/accreditation/notices' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'accreditation.notices',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/portal/accreditation/howto' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'accreditation.howto',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/portal/accreditation/requirements' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'accreditation.requirements',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/portal/accreditation/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'accreditation.profile',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'accreditation.profile.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/portal/accreditation/settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'accreditation.settings',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/portal/accreditation/downloads' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'accreditation.downloads',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/media-house/registration' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mediahouse.portal',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/media-house/registration/new' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mediahouse.new',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/media-house/registration/save-draft' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mediahouse.saveDraft',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/media-house/registration/submit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mediahouse.submit',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/media-house/registration/staff-members' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mediahouse.staff.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/media-house/registration/staff-members/link' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mediahouse.staff.link',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/media-house/registration/renewals' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mediahouse.renewals',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/media-house/registration/renewals/save-draft' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mediahouse.ap5.saveDraft',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/media-house/registration/renewals/submit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mediahouse.ap5.submit',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/media-house/registration/payments' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mediahouse.payments',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/media-house/registration/notices' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mediahouse.notices',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/media-house/registration/howto' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mediahouse.howto',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/media-house/registration/requirements' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mediahouse.requirements',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/media-house/registration/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mediahouse.profile',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'mediahouse.profile.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/media-house/registration/settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mediahouse.settings',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/media-house/registration/downloads' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mediahouse.downloads',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/messages' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'messages.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/portal/notices-events' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'portal.notices-events.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/dashboard/stats' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.dashboard.stats',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/analytics' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.analytics',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/downloads' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.downloads.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/media-house-registrations' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.mediahouse.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/journalist-accreditations' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.accreditation.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/content' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.content.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/content/notices' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.content.notices.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/content/events' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.content.events.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/news' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.news.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.news.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/complaints' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.complaints.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/workflow' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.workflow.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/templates' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.templates.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/fees' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.fees.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/audit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.audit.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/regions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.regions.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/system-health' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.health.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/login-activity' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.users.login_activity',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/workflow-config' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.workflow.config',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/fees-config' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.fees.config',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/templates-config' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.templates.config',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/content-control' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.content.control',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/regions-offices' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.regions.offices',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/master-settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.system.master_settings',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/system-settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.system.settings',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/reports' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.reports.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.settings.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.settings.profile.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.settings.password.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/theme' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.settings.theme.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.users.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.users.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/users/staff' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.users.staff',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/users/public' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.users.public',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/users/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.users.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/roles' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.roles.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.roles.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/permissions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.permissions.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.permissions.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/permissions/matrix' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.permissions.matrix',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user-approvals' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.approvals.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/news' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.news',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/notices' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.notices',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/events' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.events',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/website/complaints' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'website.complaints.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.search',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/physical-intake' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.physical-intake',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.physical-intake.process',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/production-queue' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.production-queue',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/applications' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.applications.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/applications-new' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.applications.new',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/applications-pending' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.applications.pending',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/applications-approved' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.applications.approved',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/applications-rejected' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.applications.rejected',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/applications-bulk' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.applications.bulk',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/records/journalists' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.records.journalists',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/records/mediahouses' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.records.mediahouses',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/records/history' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.records.history',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/records/renewals' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.records.renewals',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/documents/uploaded' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.documents.uploaded',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/documents/pending' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.documents.pending',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/documents/verified' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.documents.verified',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/documents/rejected' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.documents.rejected',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/renewals/expiring' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.renewals.expiring',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/renewals/expired' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.renewals.expired',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/renewals/requests' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.renewals.requests',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/renewals/queue' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.renewals.queue',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/renewals/send-reminders' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.renewals.send-reminders',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/records/accredited-journalists' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.records.accredited-journalists',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/records/registered-mediahouses' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.records.registered-mediahouses',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/records/send-collection-notification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.records.send-collection-notification',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/compliance/monitoring' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.compliance.monitoring',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/compliance/violations' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.compliance.violations',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/compliance/cases' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.compliance.cases',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/compliance/unaccredited' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.compliance.unaccredited',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/reports/stats' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.reports.stats',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/reports/monthly' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.reports.monthly',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/reports/trends' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.reports.trends',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/reports/compliance' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.reports.compliance',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/comm/notices' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.comm.notices',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/comm/announcements' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.comm.announcements',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/comm/memos' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.comm.memos',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/comm/messaging' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.comm.messaging',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/advanced/duplicates' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.advanced.duplicates',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/advanced/forgery' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.advanced.forgery',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/advanced/qr' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.advanced.qr',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/advanced/audit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.advanced.audit',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/tools/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.tools.profile',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/tools/tasks' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.tools.tasks',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/tools/drafts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.tools.drafts',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accreditation-officer/tools/sops' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.tools.sops',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/registrar' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.registrar.dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/registrar/incoming-queue' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.registrar.incoming-queue',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/registrar/reports' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.registrar.reports',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/registrar/audit-trail' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.registrar.audit-trail',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/registrar/renewals/send-reminders' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.registrar.renewals.send-reminders',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/registrar/accounts-oversight' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.registrar.accounts-oversight',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/registrar/reminders' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.registrar.reminders.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'staff.registrar.reminders.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/registrar/notices-events' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.registrar.notices-events',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/registrar/news' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.registrar.news',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accounts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accounts/payments' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.payments.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accounts/payments/offline/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.payments.offline.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accounts/payments/offline/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.payments.offline.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accounts/ledger' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.ledger',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accounts/reconciliation/mark' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.reconciliation.mark',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accounts/reports/financial' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.reports.financial',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accounts/paynow-transactions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.paynow.transactions',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accounts/payment-proofs/pending' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.proofs.pending',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accounts/payment-proofs/approved' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.proofs.approved',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accounts/payment-proofs/bulk-download' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.proofs.bulk-download',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accounts/cash-payment/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.cash-payment.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accounts/cash-payment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.cash-payment.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accounts/waivers/requests' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.waivers.requests',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accounts/waivers/approved' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.waivers.approved',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accounts/waivers/rejected' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.waivers.rejected',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accounts/reconciliation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.reconciliation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accounts/applications/paid' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.apps.paid',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accounts/applications/pending' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.apps.pending',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accounts/applications/waived' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.apps.waived',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accounts/reports/revenue' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.reports.revenue',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accounts/reports/export-ledger' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.reports.export-ledger',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accounts/reports/exceptions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.reports.exceptions',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accounts/reports/audit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.reports.audit',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accounts/alerts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.alerts',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accounts/tools/paynow-settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.tools.paynow',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accounts/tools/user-action-logs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.tools.logs',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/accounts/help' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.help',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/production' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.production.dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/production/queue' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.production.queue',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/production/cards' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.production.cards',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/production/certificates' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.production.certificates',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/production/printing' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.production.printing',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/production/issuance' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.production.issuance',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/production/registers/issued' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.production.registers.issued',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/production/reports' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.production.reports',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/production/batch/print' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.production.batch.print',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/production/designer' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.production.designer',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/production/templates' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.production.templates',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'staff.production.templates.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/users/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.users.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.users.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/regions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.regions.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/notices' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.notices.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/events' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.events.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/vacancies' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.vacancies.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/tenders' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.tenders.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/applicants' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.applicants.list',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/monitoring' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.monitoring',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/drafts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.drafts',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/files' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.files',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/errors' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.errors',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/users-mgmt' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.users-mgmt',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/workflow-mgmt' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.workflow-mgmt',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/accreditation-mgmt' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.accreditation-mgmt',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/notifications-mgmt' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.notifications-mgmt',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/payments-mgmt' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.payments-mgmt',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/security-mgmt' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.security-mgmt',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/backup-mgmt' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.backup-mgmt',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/audit-mgmt' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.audit-mgmt',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/system-mgmt' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.system-mgmt',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/performance-mgmt' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.performance-mgmt',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/reports-mgmt' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.reports-mgmt',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/mediahouses-mgmt' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.mediahouses-mgmt',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/config/save' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.config.save',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/fees/sync' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.fees.sync',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/fees/save' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.fees.save',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/notifications/template/save' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.notifications.template.save',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/payments/process-queue' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.payments.process_queue',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/system/backup' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.system.backup',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/system/clear-cache' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.system.clear_cache',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/system/cleanup' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.system.cleanup',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/security/ip/block' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.security.ip.block',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/security/toggle-rate-limiting' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.security.toggle_rate_limiting',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/security/ssl-audit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.security.ssl_audit',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/it/command-center' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/auditor' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.auditor.dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/auditor/analytics' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.auditor.analytics',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/auditor/logins' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.auditor.logins',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/auditor/logins.csv' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.auditor.logins.csv',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/auditor/applications' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.auditor.applications',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/auditor/applications.csv' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.auditor.applications.csv',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/auditor/payments/paynow' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.auditor.paynow',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/auditor/payments/paynow.csv' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.auditor.paynow.csv',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/auditor/payments/proofs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.auditor.proofs',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/auditor/payments/proofs.csv' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.auditor.proofs.csv',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/auditor/payments/waivers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.auditor.waivers',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/auditor/payments/waivers.csv' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.auditor.waivers.csv',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/auditor/logs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.auditor.logs',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/auditor/logs.csv' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.auditor.logs.csv',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/auditor/reports' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.auditor.reports',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/auditor/reports.csv' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.auditor.reports.csv',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/auditor/security' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.auditor.security',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/auditor/security.csv' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.auditor.security.csv',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/auditor/activity.csv' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.auditor.activity.csv',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/auditor/flag' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.auditor.flag',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/director' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.director.dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/director/reports/accreditation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.director.reports.accreditation',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/director/reports/financial' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.director.reports.financial',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/director/reports/compliance' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.director.reports.compliance',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/director/reports/mediahouses' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.director.reports.mediahouses',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/director/reports/staff' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.director.reports.staff',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/director/reports/issuance' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.director.reports.issuance',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/director/reports/geographic' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.director.reports.geographic',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/director/reports/downloads' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.director.reports.downloads',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/director/generate/monthly-accreditation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.director.generate.monthly-accreditation',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/director/generate/revenue-financial' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.director.generate.revenue-financial',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/director/generate/compliance-audit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.director.generate.compliance-audit',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/director/generate/mediahouse-status' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.director.generate.mediahouse-status',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/staff/director/generate/operational-performance' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.director.generate.operational-performance',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/chatbot/message' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'chatbot.message',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/reset\\-password/([^/]++)(*:32)|/lang/([^/]++)(*:53)|/p(?|ortal/a(?|ccreditation/(?|applications/([^/]++)(?|/(?|edit(*:123)|resubmit(*:139)|withdraw(*:155))|(*:164))|lookup\\-number/([^/]++)(*:196)|downloads/file/([^/]++)(*:227))|pplications/([^/]++)/details(*:264))|ayments/([^/]++)/(?|initiate(?|(*:304)|\\-mobile(*:320))|s(?|tatus(*:338)|ubmit\\-reference(*:362))|upload\\-(?|proof(*:387)|waiver(*:401))))|/me(?|dia\\-house/registration/(?|applications/([^/]++)(?|/(?|edit(*:477)|resubmit(*:493)|withdraw(*:509))|(*:518))|staff\\-members/([^/]++)(*:550)|lookup\\-number/([^/]++)(*:581)|downloads/file/([^/]++)(*:612))|ssages/application/([^/]++)(?|(*:651)))|/a(?|dmin/(?|downloads/csv/([^/]++)(*:696)|applications/([^/]++)(*:725)|co(?|ntent/(?|notices/([^/]++)(?|(*:766))|events/([^/]++)(?|(*:793)))|mplaints/([^/]++)(*:820))|news/([^/]++)(?|(*:845))|user(?|s/([^/]++)/(?|access(?|(*:884))|reset(*:898))|\\-approvals/([^/]++)/approve(*:935))|roles/([^/]++)(?|/edit(*:966)|(*:974)))|ccount/setup/([^/]++)(?|(*:1008)))|/st(?|aff/(?|a(?|pplications/([^/]++)/details(*:1064)|cc(?|reditation\\-officer/applications(?|/([^/]++)(?|(*:1125)|/(?|approve(*:1145)|request\\-correction(*:1173)|message(*:1189)|unlock(*:1204)|forward\\-to\\-registrar(*:1235)))|\\-export/(all|new|pending|approved|rejected)(*:1290))|ounts/(?|payments/(?|retry/([^/]++)(*:1335)|([^/]++)/re(?|verse(*:1363)|fund(*:1376)))|refunds/([^/]++)/approve(*:1411)|applications/([^/]++)(?|/(?|p(?|roof/(?|approve(*:1467)|reject(*:1482))|a(?|yment/reject(*:1508)|id(*:1519)))|waiver(?|\\-verification/(?|approve(*:1564)|reject(*:1579))|/(?|approve(*:1600)|reject(*:1615)))|re(?|ceipt(*:1636)|turn(*:1649))|unlock(*:1665))|(*:1675))|cash\\-payment/([^/]++)/void(*:1712))))|documents/([^/]++)(*:1742)|registrar/(?|applications/([^/]++)/(?|reassign\\-category(*:1807)|approve\\-for\\-payment(*:1837))|(accreditation|registration)/applications/(new|under-review|approved|rejected|corrections)(*:1937)|renewals/(due-soon|submitted|renewed-expired)(*:1991)|applications/([^/]++)(?|(*:2024)|/(?|approve(*:2044)|re(?|ject(*:2062)|turn(*:2075))|fix\\-request(*:2097)|push\\-to\\-accounts(*:2124))))|production/(?|applications/([^/]++)(?|(*:2174)|/(?|c(?|ard/pr(?|eview(*:2205)|int(?|(*:2220)|\\-back(*:2235)))|ertificate/pr(?|eview(*:2267)|int(*:2279)))|generate\\-c(?|ard(*:2307)|ertificate(*:2326))|print(*:2341)|issue(*:2355)|unlock(*:2370)))|templates/([^/]++)(?|(*:2402)|/activate(*:2420)))|it/(?|re(?|gions/([^/]++)/toggle(*:2463)|ports/generate/([^/]++)(*:2495))|notices/([^/]++)(?|(*:2524))|events/([^/]++)(?|(*:2552))|vacancies/([^/]++)(?|(*:2583))|tenders/([^/]++)(?|(*:2612))|applica(?|nts/([^/]++)/reset(*:2650)|tion(?|\\-overview/([^/]++)(?|(*:2688)|/download\\-batch(*:2713))|/([^/]++)/(?|unlock(*:2742)|reset(*:2756))))|user/([^/]++)/(?|suspend(*:2792)|reset\\-password(*:2816))|security/session/([^/]++)/logout(*:2858)))|orage/(.*)(*:2879))|/verify/([^/]++)(*:2905))/?$}sDu',
    ),
    3 => 
    array (
      32 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.reset',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      53 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'lang.switch',
          ),
          1 => 
          array (
            0 => 'locale',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      123 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'accreditation.applications.edit',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      139 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'accreditation.applications.resubmit',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      155 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'accreditation.withdraw',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      164 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'accreditation.delete_draft',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      196 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'accreditation.lookupNumber',
          ),
          1 => 
          array (
            0 => 'number',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      227 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'accreditation.downloads.file',
          ),
          1 => 
          array (
            0 => 'doc',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      264 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'portal.applications.details',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      304 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'paynow.initiate',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      320 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'paynow.initiate.mobile',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      338 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'paynow.status',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      362 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payments.submit_reference',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      387 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payments.upload_proof',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      401 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'payments.upload_waiver',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      477 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mediahouse.applications.edit',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      493 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mediahouse.applications.resubmit',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      509 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mediahouse.withdraw',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      518 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mediahouse.delete_draft',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      550 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mediahouse.staff.unlink',
          ),
          1 => 
          array (
            0 => 'staff',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      581 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mediahouse.lookupNumber',
          ),
          1 => 
          array (
            0 => 'number',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      612 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'mediahouse.downloads.file',
          ),
          1 => 
          array (
            0 => 'doc',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      651 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'messages.thread',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'messages.send',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      696 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.downloads.csv',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      725 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.applications.show',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      766 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.content.notices.update',
          ),
          1 => 
          array (
            0 => 'notice',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.content.notices.destroy',
          ),
          1 => 
          array (
            0 => 'notice',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      793 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.content.events.update',
          ),
          1 => 
          array (
            0 => 'event',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.content.events.destroy',
          ),
          1 => 
          array (
            0 => 'event',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      820 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.complaints.update',
          ),
          1 => 
          array (
            0 => 'complaint',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      845 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.news.update',
          ),
          1 => 
          array (
            0 => 'news',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.news.destroy',
          ),
          1 => 
          array (
            0 => 'news',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      884 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.users.access.edit',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.users.access.update',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      898 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.users.reset',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      935 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.approvals.approve',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      966 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.roles.edit',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      974 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.roles.update',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1008 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'account.setup',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'account.setup.update',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1064 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.applications.details',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1125 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.applications.show',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1145 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.applications.approve',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1173 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.applications.requestCorrection',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1189 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.applications.message',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1204 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.applications.unlock',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1235 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.applications.forward-to-registrar',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1290 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.officer.applications.export',
          ),
          1 => 
          array (
            0 => 'list',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1335 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.payments.retry',
          ),
          1 => 
          array (
            0 => 'payment',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1363 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.payments.reverse',
          ),
          1 => 
          array (
            0 => 'payment',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1376 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.payments.refund',
          ),
          1 => 
          array (
            0 => 'payment',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1411 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.refunds.approve',
          ),
          1 => 
          array (
            0 => 'refund',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1467 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.proofs.approve',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1482 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.proofs.reject',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1508 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.applications.payment.reject',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1519 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.applications.paid',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1564 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.waiver-verification.approve',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1579 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.waiver-verification.reject',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1600 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.waivers.approve',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1615 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.waivers.reject',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1636 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.applications.receipt',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1649 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.applications.return',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1665 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.applications.unlock',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1675 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.applications.show',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1712 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.accounts.cash-payment.void',
          ),
          1 => 
          array (
            0 => 'payment',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1742 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.documents.show',
          ),
          1 => 
          array (
            0 => 'document',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1807 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.registrar.applications.reassign-category',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1837 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.registrar.applications.approve-for-payment',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1937 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.registrar.apps.list',
          ),
          1 => 
          array (
            0 => 'type',
            1 => 'bucket',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1991 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.registrar.renewals.list',
          ),
          1 => 
          array (
            0 => 'bucket',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2024 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.registrar.applications.show',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2044 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.registrar.applications.approve',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2062 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.registrar.applications.reject',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2075 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.registrar.applications.return',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2097 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.registrar.applications.fix-request',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2124 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.registrar.applications.push-to-accounts',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2174 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.production.applications.show',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2205 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.production.applications.card.preview',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2220 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.production.applications.card.print',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2235 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.production.applications.card.print_back',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2267 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.production.applications.certificate.preview',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2279 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.production.applications.certificate.print',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2307 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.production.applications.generate_card',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2326 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.production.applications.generate_certificate',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2341 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.production.applications.print_single',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2355 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.production.applications.issue',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2370 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.production.applications.unlock',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2402 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.production.templates.update',
          ),
          1 => 
          array (
            0 => 'template',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2420 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.production.templates.activate',
          ),
          1 => 
          array (
            0 => 'template',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2463 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.regions.toggle',
          ),
          1 => 
          array (
            0 => 'region',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2495 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.reports.generate',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2524 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.notices.update',
          ),
          1 => 
          array (
            0 => 'notice',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.notices.destroy',
          ),
          1 => 
          array (
            0 => 'notice',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2552 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.events.update',
          ),
          1 => 
          array (
            0 => 'event',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.events.destroy',
          ),
          1 => 
          array (
            0 => 'event',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2583 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.vacancies.update',
          ),
          1 => 
          array (
            0 => 'vacancy',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.vacancies.destroy',
          ),
          1 => 
          array (
            0 => 'vacancy',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2612 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.tenders.update',
          ),
          1 => 
          array (
            0 => 'tender',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.tenders.destroy',
          ),
          1 => 
          array (
            0 => 'tender',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2650 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.applicants.reset',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2688 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.application.overview',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2713 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.application.download_batch',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2742 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.application.unlock',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2756 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.application.reset',
          ),
          1 => 
          array (
            0 => 'application',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2792 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.user.suspend',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2816 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.user.reset_password',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2858 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'staff.it.security.session.logout',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2879 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'storage.local',
          ),
          1 => 
          array (
            0 => 'path',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2905 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'public.verify',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'adminlte.darkmode.toggle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'adminlte/darkmode/toggle',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'JeroenNoten\\LaravelAdminLte\\Http\\Controllers\\DarkModeController@toggle',
        'controller' => 'JeroenNoten\\LaravelAdminLte\\Http\\Controllers\\DarkModeController@toggle',
        'as' => 'adminlte.darkmode.toggle',
        'namespace' => NULL,
        'prefix' => 'adminlte',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sanctum.csrf-cookie' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sanctum/csrf-cookie',
      'action' => 
      array (
        'uses' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'controller' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'namespace' => NULL,
        'prefix' => 'sanctum',
        'where' => 
        array (
        ),
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'sanctum.csrf-cookie',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::M4DQ1j3w32gDA7jZ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'up',
      'action' => 
      array (
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:816:"function () {
                    $exception = null;

                    try {
                        \\Illuminate\\Support\\Facades\\Event::dispatch(new \\Illuminate\\Foundation\\Events\\DiagnosingHealth);
                    } catch (\\Throwable $e) {
                        if (app()->hasDebugModeEnabled()) {
                            throw $e;
                        }

                        report($e);

                        $exception = $e->getMessage();
                    }

                    return response(\\Illuminate\\Support\\Facades\\View::file(\'/home/runner/workspace/vendor/laravel/framework/src/Illuminate/Foundation/Configuration\'.\'/../resources/health-up.blade.php\', [
                        \'exception\' => $exception,
                    ]), status: $exception ? 500 : 200);
                }";s:5:"scope";s:54:"Illuminate\\Foundation\\Configuration\\ApplicationBuilder";s:4:"this";N;s:4:"self";s:32:"00000000000005820000000000000000";}}',
        'as' => 'generated::M4DQ1j3w32gDA7jZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'system.health' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'health',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\HealthController@__invoke',
        'controller' => 'App\\Http\\Controllers\\HealthController',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'system.health',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'public.home' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\HomeController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'public.home',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'public.choose_portal' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'choose-portal',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\MiscRoutesController@choosePortal',
        'controller' => 'App\\Http\\Controllers\\MiscRoutesController@choosePortal',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'public.choose_portal',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.entry' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\RoleSelectController@index',
        'controller' => 'App\\Http\\Controllers\\Staff\\RoleSelectController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'staff.entry',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.select_role' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/select-role',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\RoleSelectController@index',
        'controller' => 'App\\Http\\Controllers\\Staff\\RoleSelectController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'staff.select_role',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.choose_role' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/select-role',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\RoleSelectController@choose',
        'controller' => 'App\\Http\\Controllers\\Staff\\RoleSelectController@choose',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'staff.choose_role',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\StaffAuthController@show',
        'controller' => 'App\\Http\\Controllers\\Staff\\StaffAuthController@show',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'staff.login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.login.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\StaffAuthController@login',
        'controller' => 'App\\Http\\Controllers\\Staff\\StaffAuthController@login',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'staff.login.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\StaffAuthController@logout',
        'controller' => 'App\\Http\\Controllers\\Staff\\StaffAuthController@logout',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'staff.logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@showLoginForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@showLoginForm',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'auth.login.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'auth.login.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'register' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'signup',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisterController@showRegistrationForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisterController@showRegistrationForm',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'register',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'auth.register.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'signup',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisterController@store',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisterController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'auth.register.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.request' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'forgot-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\PasswordResetController@request',
        'controller' => 'App\\Http\\Controllers\\Auth\\PasswordResetController@request',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.request',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.email' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'forgot-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\PasswordResetController@email',
        'controller' => 'App\\Http\\Controllers\\Auth\\PasswordResetController@email',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.email',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.reset' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reset-password/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\PasswordResetController@reset',
        'controller' => 'App\\Http\\Controllers\\Auth\\PasswordResetController@reset',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.reset',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'reset-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\PasswordResetController@update',
        'controller' => 'App\\Http\\Controllers\\Auth\\PasswordResetController@update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'lang.switch' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lang/{locale}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\MiscRoutesController@switchLang',
        'controller' => 'App\\Http\\Controllers\\MiscRoutesController@switchLang',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'lang.switch',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'paynow.callback' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'paynow/callback',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Portal\\PaynowController@callback',
        'controller' => 'App\\Http\\Controllers\\Portal\\PaynowController@callback',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'paynow.callback',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'paynow.return' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'paynow/return',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Portal\\PaynowController@return',
        'controller' => 'App\\Http\\Controllers\\Portal\\PaynowController@return',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'paynow.return',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.v1.external-content' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/external-content',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\PublicContentController@getContent',
        'controller' => 'App\\Http\\Controllers\\Api\\PublicContentController@getContent',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'api.v1.external-content',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'settings' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\SettingsController@edit',
        'controller' => 'App\\Http\\Controllers\\SettingsController@edit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'settings',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'settings.profile' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'settings/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\SettingsController@updateProfile',
        'controller' => 'App\\Http\\Controllers\\SettingsController@updateProfile',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'settings.profile',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'settings.password' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'settings/password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\SettingsController@updatePassword',
        'controller' => 'App\\Http\\Controllers\\SettingsController@updatePassword',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'settings.password',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'settings.theme' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'settings/theme',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\SettingsController@updateTheme',
        'controller' => 'App\\Http\\Controllers\\SettingsController@updateTheme',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'settings.theme',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'settings.theme.ajax' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'settings/theme/ajax',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\SettingsController@updateThemeAjax',
        'controller' => 'App\\Http\\Controllers\\SettingsController@updateThemeAjax',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'settings.theme.ajax',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'settings.security' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'settings/security',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\SettingsController@updateSecurity',
        'controller' => 'App\\Http\\Controllers\\SettingsController@updateSecurity',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'settings.security',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'settings.notifications' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'settings/notifications',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\SettingsController@updateNotifications',
        'controller' => 'App\\Http\\Controllers\\SettingsController@updateNotifications',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'settings.notifications',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'home' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'home',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\MiscRoutesController@home',
        'controller' => 'App\\Http\\Controllers\\MiscRoutesController@home',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'home',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'portal' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'portal',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\PortalController@index',
        'controller' => 'App\\Http\\Controllers\\PortalController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'portal',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'accreditation.portal' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'portal/accreditation',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\AccreditationPortalController@index',
        'controller' => 'App\\Http\\Controllers\\AccreditationPortalController@index',
        'as' => 'accreditation.portal',
        'namespace' => NULL,
        'prefix' => '/portal/accreditation',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'accreditation.home' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'portal/accreditation/dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\AccreditationPortalController@dashboard',
        'controller' => 'App\\Http\\Controllers\\AccreditationPortalController@dashboard',
        'as' => 'accreditation.home',
        'namespace' => NULL,
        'prefix' => '/portal/accreditation',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'accreditation.new' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'portal/accreditation/new',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\AccreditationPortalController@new',
        'controller' => 'App\\Http\\Controllers\\AccreditationPortalController@new',
        'as' => 'accreditation.new',
        'namespace' => NULL,
        'prefix' => '/portal/accreditation',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'accreditation.applications.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'portal/accreditation/applications/{application}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\AccreditationPortalController@editCorrection',
        'controller' => 'App\\Http\\Controllers\\AccreditationPortalController@editCorrection',
        'as' => 'accreditation.applications.edit',
        'namespace' => NULL,
        'prefix' => '/portal/accreditation',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'accreditation.applications.resubmit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'portal/accreditation/applications/{application}/resubmit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\AccreditationPortalController@resubmitCorrection',
        'controller' => 'App\\Http\\Controllers\\AccreditationPortalController@resubmitCorrection',
        'as' => 'accreditation.applications.resubmit',
        'namespace' => NULL,
        'prefix' => '/portal/accreditation',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'accreditation.saveDraft' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'portal/accreditation/save-draft',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\AccreditationPortalController@saveDraft',
        'controller' => 'App\\Http\\Controllers\\AccreditationPortalController@saveDraft',
        'as' => 'accreditation.saveDraft',
        'namespace' => NULL,
        'prefix' => '/portal/accreditation',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'accreditation.submit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'portal/accreditation/submit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\AccreditationPortalController@submit',
        'controller' => 'App\\Http\\Controllers\\AccreditationPortalController@submit',
        'as' => 'accreditation.submit',
        'namespace' => NULL,
        'prefix' => '/portal/accreditation',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'accreditation.delete_draft' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'portal/accreditation/applications/{application}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\AccreditationPortalController@deleteDraft',
        'controller' => 'App\\Http\\Controllers\\AccreditationPortalController@deleteDraft',
        'as' => 'accreditation.delete_draft',
        'namespace' => NULL,
        'prefix' => '/portal/accreditation',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'accreditation.withdraw' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'portal/accreditation/applications/{application}/withdraw',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\AccreditationPortalController@withdraw',
        'controller' => 'App\\Http\\Controllers\\AccreditationPortalController@withdraw',
        'as' => 'accreditation.withdraw',
        'namespace' => NULL,
        'prefix' => '/portal/accreditation',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'accreditation.renewals' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'portal/accreditation/renewals',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\AccreditationPortalController@renewals',
        'controller' => 'App\\Http\\Controllers\\AccreditationPortalController@renewals',
        'as' => 'accreditation.renewals',
        'namespace' => NULL,
        'prefix' => '/portal/accreditation',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'accreditation.renewals.saveDraft' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'portal/accreditation/renewals/save-draft',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\AccreditationPortalController@saveDraftAp5',
        'controller' => 'App\\Http\\Controllers\\AccreditationPortalController@saveDraftAp5',
        'as' => 'accreditation.renewals.saveDraft',
        'namespace' => NULL,
        'prefix' => '/portal/accreditation',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'accreditation.submitAp5' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'portal/accreditation/renewals/submit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\AccreditationPortalController@submitAp5',
        'controller' => 'App\\Http\\Controllers\\AccreditationPortalController@submitAp5',
        'as' => 'accreditation.submitAp5',
        'namespace' => NULL,
        'prefix' => '/portal/accreditation',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'accreditation.lookupNumber' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'portal/accreditation/lookup-number/{number}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\AccreditationPortalController@lookupAccreditationNumber',
        'controller' => 'App\\Http\\Controllers\\AccreditationPortalController@lookupAccreditationNumber',
        'as' => 'accreditation.lookupNumber',
        'namespace' => NULL,
        'prefix' => '/portal/accreditation',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'accreditation.payments' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'portal/accreditation/payments',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\AccreditationPortalController@payments',
        'controller' => 'App\\Http\\Controllers\\AccreditationPortalController@payments',
        'as' => 'accreditation.payments',
        'namespace' => NULL,
        'prefix' => '/portal/accreditation',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'accreditation.notices' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'portal/accreditation/notices',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\AccreditationPortalController@notices',
        'controller' => 'App\\Http\\Controllers\\AccreditationPortalController@notices',
        'as' => 'accreditation.notices',
        'namespace' => NULL,
        'prefix' => '/portal/accreditation',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'accreditation.howto' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'portal/accreditation/howto',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\AccreditationPortalController@howto',
        'controller' => 'App\\Http\\Controllers\\AccreditationPortalController@howto',
        'as' => 'accreditation.howto',
        'namespace' => NULL,
        'prefix' => '/portal/accreditation',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'accreditation.requirements' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'portal/accreditation/requirements',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\AccreditationPortalController@requirements',
        'controller' => 'App\\Http\\Controllers\\AccreditationPortalController@requirements',
        'as' => 'accreditation.requirements',
        'namespace' => NULL,
        'prefix' => '/portal/accreditation',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'accreditation.profile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'portal/accreditation/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\AccreditationPortalController@profile',
        'controller' => 'App\\Http\\Controllers\\AccreditationPortalController@profile',
        'as' => 'accreditation.profile',
        'namespace' => NULL,
        'prefix' => '/portal/accreditation',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'accreditation.profile.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'portal/accreditation/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\AccreditationPortalController@updateProfile',
        'controller' => 'App\\Http\\Controllers\\AccreditationPortalController@updateProfile',
        'as' => 'accreditation.profile.update',
        'namespace' => NULL,
        'prefix' => '/portal/accreditation',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'accreditation.settings' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'portal/accreditation/settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\AccreditationPortalController@settings',
        'controller' => 'App\\Http\\Controllers\\AccreditationPortalController@settings',
        'as' => 'accreditation.settings',
        'namespace' => NULL,
        'prefix' => '/portal/accreditation',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'accreditation.downloads' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'portal/accreditation/downloads',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\Portal\\DownloadsController@index',
        'controller' => 'App\\Http\\Controllers\\Portal\\DownloadsController@index',
        'as' => 'accreditation.downloads',
        'namespace' => NULL,
        'prefix' => '/portal/accreditation',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'accreditation.downloads.file' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'portal/accreditation/downloads/file/{doc}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\Portal\\DownloadsController@download',
        'controller' => 'App\\Http\\Controllers\\Portal\\DownloadsController@download',
        'as' => 'accreditation.downloads.file',
        'namespace' => NULL,
        'prefix' => '/portal/accreditation',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mediahouse.portal' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'media-house/registration',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\MediaHousePortalController@dashboard',
        'controller' => 'App\\Http\\Controllers\\MediaHousePortalController@dashboard',
        'as' => 'mediahouse.portal',
        'namespace' => NULL,
        'prefix' => '/media-house/registration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mediahouse.new' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'media-house/registration/new',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\MediaHousePortalController@newRegistration',
        'controller' => 'App\\Http\\Controllers\\MediaHousePortalController@newRegistration',
        'as' => 'mediahouse.new',
        'namespace' => NULL,
        'prefix' => '/media-house/registration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mediahouse.applications.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'media-house/registration/applications/{application}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\MediaHousePortalController@editCorrection',
        'controller' => 'App\\Http\\Controllers\\MediaHousePortalController@editCorrection',
        'as' => 'mediahouse.applications.edit',
        'namespace' => NULL,
        'prefix' => '/media-house/registration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mediahouse.applications.resubmit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'media-house/registration/applications/{application}/resubmit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\MediaHousePortalController@resubmitCorrection',
        'controller' => 'App\\Http\\Controllers\\MediaHousePortalController@resubmitCorrection',
        'as' => 'mediahouse.applications.resubmit',
        'namespace' => NULL,
        'prefix' => '/media-house/registration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mediahouse.saveDraft' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'media-house/registration/save-draft',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\MediaHousePortalController@saveDraft',
        'controller' => 'App\\Http\\Controllers\\MediaHousePortalController@saveDraft',
        'as' => 'mediahouse.saveDraft',
        'namespace' => NULL,
        'prefix' => '/media-house/registration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mediahouse.submit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'media-house/registration/submit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\MediaHousePortalController@submit',
        'controller' => 'App\\Http\\Controllers\\MediaHousePortalController@submit',
        'as' => 'mediahouse.submit',
        'namespace' => NULL,
        'prefix' => '/media-house/registration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mediahouse.delete_draft' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'media-house/registration/applications/{application}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\MediaHousePortalController@deleteDraft',
        'controller' => 'App\\Http\\Controllers\\MediaHousePortalController@deleteDraft',
        'as' => 'mediahouse.delete_draft',
        'namespace' => NULL,
        'prefix' => '/media-house/registration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mediahouse.withdraw' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'media-house/registration/applications/{application}/withdraw',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\MediaHousePortalController@withdraw',
        'controller' => 'App\\Http\\Controllers\\MediaHousePortalController@withdraw',
        'as' => 'mediahouse.withdraw',
        'namespace' => NULL,
        'prefix' => '/media-house/registration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mediahouse.staff.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'media-house/registration/staff-members',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\MediaHouseStaffController@index',
        'controller' => 'App\\Http\\Controllers\\MediaHouseStaffController@index',
        'as' => 'mediahouse.staff.index',
        'namespace' => NULL,
        'prefix' => '/media-house/registration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mediahouse.staff.link' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'media-house/registration/staff-members/link',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\MediaHouseStaffController@link',
        'controller' => 'App\\Http\\Controllers\\MediaHouseStaffController@link',
        'as' => 'mediahouse.staff.link',
        'namespace' => NULL,
        'prefix' => '/media-house/registration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mediahouse.staff.unlink' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'media-house/registration/staff-members/{staff}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\MediaHouseStaffController@unlink',
        'controller' => 'App\\Http\\Controllers\\MediaHouseStaffController@unlink',
        'as' => 'mediahouse.staff.unlink',
        'namespace' => NULL,
        'prefix' => '/media-house/registration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mediahouse.renewals' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'media-house/registration/renewals',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\MediaHousePortalController@renewals',
        'controller' => 'App\\Http\\Controllers\\MediaHousePortalController@renewals',
        'as' => 'mediahouse.renewals',
        'namespace' => NULL,
        'prefix' => '/media-house/registration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mediahouse.ap5.saveDraft' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'media-house/registration/renewals/save-draft',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\MediaHousePortalController@saveDraftAp5',
        'controller' => 'App\\Http\\Controllers\\MediaHousePortalController@saveDraftAp5',
        'as' => 'mediahouse.ap5.saveDraft',
        'namespace' => NULL,
        'prefix' => '/media-house/registration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mediahouse.ap5.submit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'media-house/registration/renewals/submit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\MediaHousePortalController@submitAp5',
        'controller' => 'App\\Http\\Controllers\\MediaHousePortalController@submitAp5',
        'as' => 'mediahouse.ap5.submit',
        'namespace' => NULL,
        'prefix' => '/media-house/registration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mediahouse.lookupNumber' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'media-house/registration/lookup-number/{number}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\MediaHousePortalController@lookupRegistrationNumber',
        'controller' => 'App\\Http\\Controllers\\MediaHousePortalController@lookupRegistrationNumber',
        'as' => 'mediahouse.lookupNumber',
        'namespace' => NULL,
        'prefix' => '/media-house/registration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mediahouse.payments' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'media-house/registration/payments',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\MediaHousePortalController@payments',
        'controller' => 'App\\Http\\Controllers\\MediaHousePortalController@payments',
        'as' => 'mediahouse.payments',
        'namespace' => NULL,
        'prefix' => '/media-house/registration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mediahouse.notices' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'media-house/registration/notices',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\MediaHousePortalController@notices',
        'controller' => 'App\\Http\\Controllers\\MediaHousePortalController@notices',
        'as' => 'mediahouse.notices',
        'namespace' => NULL,
        'prefix' => '/media-house/registration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mediahouse.howto' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'media-house/registration/howto',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\MediaHousePortalController@howto',
        'controller' => 'App\\Http\\Controllers\\MediaHousePortalController@howto',
        'as' => 'mediahouse.howto',
        'namespace' => NULL,
        'prefix' => '/media-house/registration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mediahouse.requirements' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'media-house/registration/requirements',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\MediaHousePortalController@requirements',
        'controller' => 'App\\Http\\Controllers\\MediaHousePortalController@requirements',
        'as' => 'mediahouse.requirements',
        'namespace' => NULL,
        'prefix' => '/media-house/registration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mediahouse.profile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'media-house/registration/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\MediaHousePortalController@profile',
        'controller' => 'App\\Http\\Controllers\\MediaHousePortalController@profile',
        'as' => 'mediahouse.profile',
        'namespace' => NULL,
        'prefix' => '/media-house/registration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mediahouse.profile.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'media-house/registration/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\MediaHousePortalController@updateProfile',
        'controller' => 'App\\Http\\Controllers\\MediaHousePortalController@updateProfile',
        'as' => 'mediahouse.profile.update',
        'namespace' => NULL,
        'prefix' => '/media-house/registration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mediahouse.settings' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'media-house/registration/settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\MediaHousePortalController@settings',
        'controller' => 'App\\Http\\Controllers\\MediaHousePortalController@settings',
        'as' => 'mediahouse.settings',
        'namespace' => NULL,
        'prefix' => '/media-house/registration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mediahouse.downloads' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'media-house/registration/downloads',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\Portal\\DownloadsController@index',
        'controller' => 'App\\Http\\Controllers\\Portal\\DownloadsController@index',
        'as' => 'mediahouse.downloads',
        'namespace' => NULL,
        'prefix' => '/media-house/registration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'portal' => 'mediahouse',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'mediahouse.downloads.file' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'media-house/registration/downloads/file/{doc}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'applicant.portal',
        ),
        'uses' => 'App\\Http\\Controllers\\Portal\\DownloadsController@download',
        'controller' => 'App\\Http\\Controllers\\Portal\\DownloadsController@download',
        'as' => 'mediahouse.downloads.file',
        'namespace' => NULL,
        'prefix' => '/media-house/registration',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'portal' => 'mediahouse',
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'messages.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'messages',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\MessagesController@index',
        'controller' => 'App\\Http\\Controllers\\MessagesController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'messages.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'messages.thread' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'messages/application/{application}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\MessagesController@thread',
        'controller' => 'App\\Http\\Controllers\\MessagesController@thread',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'messages.thread',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'messages.send' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'messages/application/{application}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\MessagesController@send',
        'controller' => 'App\\Http\\Controllers\\MessagesController@send',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'messages.send',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'portal.applications.details' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'portal/applications/{application}/details',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Portal\\PortalApplicationDetailsController@show',
        'controller' => 'App\\Http\\Controllers\\Portal\\PortalApplicationDetailsController@show',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'portal.applications.details',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'portal.notices-events.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'portal/notices-events',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Portal\\NoticesEventsController@index',
        'controller' => 'App\\Http\\Controllers\\Portal\\NoticesEventsController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'portal.notices-events.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'paynow.initiate' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'payments/{application}/initiate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Portal\\PaynowController@initiate',
        'controller' => 'App\\Http\\Controllers\\Portal\\PaynowController@initiate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'paynow.initiate',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'paynow.initiate.mobile' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'payments/{application}/initiate-mobile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Portal\\PaynowController@initiateMobile',
        'controller' => 'App\\Http\\Controllers\\Portal\\PaynowController@initiateMobile',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'paynow.initiate.mobile',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'paynow.status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'payments/{application}/status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Portal\\PaynowController@checkStatus',
        'controller' => 'App\\Http\\Controllers\\Portal\\PaynowController@checkStatus',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'paynow.status',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payments.upload_proof' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'payments/{application}/upload-proof',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Portal\\ManualPaymentController@uploadProof',
        'controller' => 'App\\Http\\Controllers\\Portal\\ManualPaymentController@uploadProof',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'payments.upload_proof',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payments.upload_waiver' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'payments/{application}/upload-waiver',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Portal\\ManualPaymentController@uploadWaiver',
        'controller' => 'App\\Http\\Controllers\\Portal\\ManualPaymentController@uploadWaiver',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'payments.upload_waiver',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'payments.submit_reference' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'payments/{application}/submit-reference',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Portal\\ManualPaymentController@submitReference',
        'controller' => 'App\\Http\\Controllers\\Portal\\ManualPaymentController@submitReference',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'payments.submit_reference',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminDashboardController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminDashboardController@index',
        'as' => 'admin.dashboard',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.dashboard.stats' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/dashboard/stats',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminDashboardController@stats',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminDashboardController@stats',
        'as' => 'admin.dashboard.stats',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.analytics' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/analytics',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminAnalyticsController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminAnalyticsController@index',
        'as' => 'admin.analytics',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.downloads.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/downloads',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\DownloadsController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\DownloadsController@index',
        'as' => 'admin.downloads.index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.downloads.csv' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/downloads/csv/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\DownloadsController@csv',
        'controller' => 'App\\Http\\Controllers\\Admin\\DownloadsController@csv',
        'as' => 'admin.downloads.csv',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.mediahouse.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/media-house-registrations',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminApplicationsController@mediaHouse',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminApplicationsController@mediaHouse',
        'as' => 'admin.mediahouse.index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.accreditation.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/journalist-accreditations',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminApplicationsController@accreditation',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminApplicationsController@accreditation',
        'as' => 'admin.accreditation.index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.applications.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/applications/{application}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminApplicationsController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminApplicationsController@show',
        'as' => 'admin.applications.show',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.content.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/content',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
          3 => 'module.enabled:notices',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ContentController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\ContentController@index',
        'as' => 'admin.content.index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.content.notices.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/content/notices',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
          3 => 'role:super_admin|it_admin',
          4 => 'module.enabled:notices',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ContentController@storeNotice',
        'controller' => 'App\\Http\\Controllers\\Admin\\ContentController@storeNotice',
        'as' => 'admin.content.notices.store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.content.notices.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/content/notices/{notice}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
          3 => 'role:super_admin|it_admin',
          4 => 'module.enabled:notices',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ContentController@updateNotice',
        'controller' => 'App\\Http\\Controllers\\Admin\\ContentController@updateNotice',
        'as' => 'admin.content.notices.update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.content.notices.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/content/notices/{notice}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
          3 => 'role:super_admin|it_admin',
          4 => 'module.enabled:notices',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ContentController@destroyNotice',
        'controller' => 'App\\Http\\Controllers\\Admin\\ContentController@destroyNotice',
        'as' => 'admin.content.notices.destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.content.events.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/content/events',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
          3 => 'role:super_admin|it_admin',
          4 => 'module.enabled:events',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ContentController@storeEvent',
        'controller' => 'App\\Http\\Controllers\\Admin\\ContentController@storeEvent',
        'as' => 'admin.content.events.store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.content.events.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/content/events/{event}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
          3 => 'role:super_admin|it_admin',
          4 => 'module.enabled:events',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ContentController@updateEvent',
        'controller' => 'App\\Http\\Controllers\\Admin\\ContentController@updateEvent',
        'as' => 'admin.content.events.update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.content.events.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/content/events/{event}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
          3 => 'role:super_admin|it_admin',
          4 => 'module.enabled:events',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ContentController@destroyEvent',
        'controller' => 'App\\Http\\Controllers\\Admin\\ContentController@destroyEvent',
        'as' => 'admin.content.events.destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.news.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/news',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
          3 => 'module.enabled:news',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\NewsController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\NewsController@index',
        'as' => 'admin.news.index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.news.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/news',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
          3 => 'role:super_admin|it_admin',
          4 => 'module.enabled:news',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\NewsController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\NewsController@store',
        'as' => 'admin.news.store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.news.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/news/{news}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
          3 => 'role:super_admin|it_admin',
          4 => 'module.enabled:news',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\NewsController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\NewsController@update',
        'as' => 'admin.news.update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.news.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/news/{news}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
          3 => 'role:super_admin|it_admin',
          4 => 'module.enabled:news',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\NewsController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\NewsController@destroy',
        'as' => 'admin.news.destroy',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.complaints.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/complaints',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ComplaintsController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\ComplaintsController@index',
        'as' => 'admin.complaints.index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.complaints.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/complaints/{complaint}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ComplaintsController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\ComplaintsController@update',
        'as' => 'admin.complaints.update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.workflow.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/workflow',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
          3 => 'role:super_admin|it_admin|director',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminSystemController@workflow',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminSystemController@workflow',
        'as' => 'admin.workflow.index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.templates.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/templates',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
          3 => 'role:super_admin|it_admin|director',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminSystemController@templates',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminSystemController@templates',
        'as' => 'admin.templates.index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.fees.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/fees',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
          3 => 'role:super_admin|it_admin|director',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminSystemController@fees',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminSystemController@fees',
        'as' => 'admin.fees.index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.audit.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/audit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
          3 => 'role:super_admin|it_admin|director|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminSystemController@audit',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminSystemController@audit',
        'as' => 'admin.audit.index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.regions.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/regions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
          3 => 'role:super_admin|it_admin|director|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminSystemController@regions',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminSystemController@regions',
        'as' => 'admin.regions.index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.health.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/system-health',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
          3 => 'role:super_admin|it_admin|director',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminSystemController@health',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminSystemController@health',
        'as' => 'admin.health.index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.users.login_activity' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/login-activity',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
          3 => 'role:super_admin|it_admin|director',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\SuperAdminConfigController@loginActivity',
        'controller' => 'App\\Http\\Controllers\\Admin\\SuperAdminConfigController@loginActivity',
        'as' => 'admin.users.login_activity',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.workflow.config' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/workflow-config',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
          3 => 'role:super_admin|it_admin|director',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\SuperAdminConfigController@workflowConfig',
        'controller' => 'App\\Http\\Controllers\\Admin\\SuperAdminConfigController@workflowConfig',
        'as' => 'admin.workflow.config',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.fees.config' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/fees-config',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
          3 => 'role:super_admin|it_admin|director',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\SuperAdminConfigController@feesConfig',
        'controller' => 'App\\Http\\Controllers\\Admin\\SuperAdminConfigController@feesConfig',
        'as' => 'admin.fees.config',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.templates.config' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/templates-config',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
          3 => 'role:super_admin|it_admin|director',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\SuperAdminConfigController@templates',
        'controller' => 'App\\Http\\Controllers\\Admin\\SuperAdminConfigController@templates',
        'as' => 'admin.templates.config',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.content.control' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/content-control',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
          3 => 'role:super_admin|it_admin|director',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\SuperAdminConfigController@contentControl',
        'controller' => 'App\\Http\\Controllers\\Admin\\SuperAdminConfigController@contentControl',
        'as' => 'admin.content.control',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.regions.offices' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/regions-offices',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
          3 => 'role:super_admin|it_admin|director',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\SuperAdminConfigController@regionsOffices',
        'controller' => 'App\\Http\\Controllers\\Admin\\SuperAdminConfigController@regionsOffices',
        'as' => 'admin.regions.offices',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.system.master_settings' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'admin/master-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
          3 => 'role:super_admin|it_admin|director',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\SuperAdminConfigController@masterSettings',
        'controller' => 'App\\Http\\Controllers\\Admin\\SuperAdminConfigController@masterSettings',
        'as' => 'admin.system.master_settings',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.system.settings' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/system-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
          3 => 'role:super_admin|it_admin|director',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:58:"fn() => \\redirect()->route(\'admin.system.master_settings\')";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000005070000000000000000";}}',
        'as' => 'admin.system.settings',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.reports.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/reports',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
          3 => 'role:super_admin|it_admin|director',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\SuperAdminConfigController@reports',
        'controller' => 'App\\Http\\Controllers\\Admin\\SuperAdminConfigController@reports',
        'as' => 'admin.reports.index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.settings.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AdminSystemController@settings',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdminSystemController@settings',
        'as' => 'admin.settings.index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.settings.profile.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/settings/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\SettingsController@updateProfile',
        'controller' => 'App\\Http\\Controllers\\SettingsController@updateProfile',
        'as' => 'admin.settings.profile.update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.settings.password.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/settings/password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\SettingsController@updatePassword',
        'controller' => 'App\\Http\\Controllers\\SettingsController@updatePassword',
        'as' => 'admin.settings.password.update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.settings.theme.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/settings/theme',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\SettingsController@updateTheme',
        'controller' => 'App\\Http\\Controllers\\SettingsController@updateTheme',
        'as' => 'admin.settings.theme.update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.users.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\UserAccessController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserAccessController@index',
        'as' => 'admin.users.index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.users.staff' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/users/staff',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\UserAccessController@staffIndex',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserAccessController@staffIndex',
        'as' => 'admin.users.staff',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.users.public' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/users/public',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\UserAccessController@publicIndex',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserAccessController@publicIndex',
        'as' => 'admin.users.public',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.users.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/users/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\UserAccessController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserAccessController@create',
        'as' => 'admin.users.create',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.users.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\UserAccessController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserAccessController@store',
        'as' => 'admin.users.store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.users.access.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/users/{user}/access',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\UserAccessController@editAccess',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserAccessController@editAccess',
        'as' => 'admin.users.access.edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.users.access.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/users/{user}/access',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\UserAccessController@updateAccess',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserAccessController@updateAccess',
        'as' => 'admin.users.access.update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.users.reset' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/users/{user}/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\UserAccessController@resetAccount',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserAccessController@resetAccount',
        'as' => 'admin.users.reset',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.roles.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/roles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
          3 => 'role:super_admin|director',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\RolePermissionController@rolesIndex',
        'controller' => 'App\\Http\\Controllers\\Admin\\RolePermissionController@rolesIndex',
        'as' => 'admin.roles.index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.roles.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/roles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
          3 => 'role:super_admin|director',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\RolePermissionController@rolesStore',
        'controller' => 'App\\Http\\Controllers\\Admin\\RolePermissionController@rolesStore',
        'as' => 'admin.roles.store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.roles.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/roles/{role}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
          3 => 'role:super_admin|director',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\RolePermissionController@rolesEdit',
        'controller' => 'App\\Http\\Controllers\\Admin\\RolePermissionController@rolesEdit',
        'as' => 'admin.roles.edit',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.roles.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/roles/{role}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
          3 => 'role:super_admin|director',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\RolePermissionController@rolesUpdate',
        'controller' => 'App\\Http\\Controllers\\Admin\\RolePermissionController@rolesUpdate',
        'as' => 'admin.roles.update',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.permissions.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/permissions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
          3 => 'role:super_admin|director',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\RolePermissionController@permissionsIndex',
        'controller' => 'App\\Http\\Controllers\\Admin\\RolePermissionController@permissionsIndex',
        'as' => 'admin.permissions.index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.permissions.matrix' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/permissions/matrix',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
          3 => 'role:super_admin|director',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\RolePermissionController@permissionMatrix',
        'controller' => 'App\\Http\\Controllers\\Admin\\RolePermissionController@permissionMatrix',
        'as' => 'admin.permissions.matrix',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.permissions.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/permissions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
          3 => 'role:super_admin|director',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\RolePermissionController@permissionsStore',
        'controller' => 'App\\Http\\Controllers\\Admin\\RolePermissionController@permissionsStore',
        'as' => 'admin.permissions.store',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.approvals.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/user-approvals',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\UserApprovalController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserApprovalController@index',
        'as' => 'admin.approvals.index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.approvals.approve' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/user-approvals/{user}/approve',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'role:super_admin|director|it_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\UserApprovalController@approve',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserApprovalController@approve',
        'as' => 'admin.approvals.approve',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.news' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/news',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\PublicContentController@news',
        'controller' => 'App\\Http\\Controllers\\Website\\PublicContentController@news',
        'as' => 'api.news',
        'namespace' => NULL,
        'prefix' => '/api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.notices' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/notices',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\PublicContentController@notices',
        'controller' => 'App\\Http\\Controllers\\Website\\PublicContentController@notices',
        'as' => 'api.notices',
        'namespace' => NULL,
        'prefix' => '/api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.events' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/events',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\PublicContentController@events',
        'controller' => 'App\\Http\\Controllers\\Website\\PublicContentController@events',
        'as' => 'api.events',
        'namespace' => NULL,
        'prefix' => '/api',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'website.complaints.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'website/complaints',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Website\\ComplaintsController@store',
        'controller' => 'App\\Http\\Controllers\\Website\\ComplaintsController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'website.complaints.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'account.setup' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'account/setup/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\AccountSetupController@show',
        'controller' => 'App\\Http\\Controllers\\Auth\\AccountSetupController@show',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'account.setup',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'account.setup.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'account/setup/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\AccountSetupController@update',
        'controller' => 'App\\Http\\Controllers\\Auth\\AccountSetupController@update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'account.setup.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.applications.details' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/applications/{application}/details',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer|accounts_payments|registrar|production',
        ),
        'uses' => '\\App\\Http\\Controllers\\Staff\\ApplicationDetailsController@show',
        'controller' => '\\App\\Http\\Controllers\\Staff\\ApplicationDetailsController@show',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'staff.applications.details',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.search' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
        ),
        'uses' => '\\App\\Http\\Controllers\\Staff\\ApplicationDetailsController@globalSearch',
        'controller' => '\\App\\Http\\Controllers\\Staff\\ApplicationDetailsController@globalSearch',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'staff.search',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.documents.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/documents/{document}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer|registrar|accounts_payments|production|auditor|super_admin|it_admin|director',
        ),
        'uses' => '\\App\\Http\\Controllers\\Staff\\DocumentViewController@show',
        'controller' => '\\App\\Http\\Controllers\\Staff\\DocumentViewController@show',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'staff.documents.show',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@dashboard',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@dashboard',
        'as' => 'staff.officer.dashboard',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.applications.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/applications/{application}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@show',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@show',
        'as' => 'staff.officer.applications.show',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.applications.approve' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/accreditation-officer/applications/{application}/approve',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@approve',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@approve',
        'as' => 'staff.officer.applications.approve',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.applications.requestCorrection' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/accreditation-officer/applications/{application}/request-correction',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@requestCorrection',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@requestCorrection',
        'as' => 'staff.officer.applications.requestCorrection',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.applications.message' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/accreditation-officer/applications/{application}/message',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@sendMessage',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@sendMessage',
        'as' => 'staff.officer.applications.message',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.applications.unlock' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/accreditation-officer/applications/{application}/unlock',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@unlock',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@unlock',
        'as' => 'staff.officer.applications.unlock',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.applications.forward-to-registrar' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/accreditation-officer/applications/{application}/forward-to-registrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@forwardToRegistrar',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@forwardToRegistrar',
        'as' => 'staff.officer.applications.forward-to-registrar',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.physical-intake' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/physical-intake',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@physicalIntake',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@physicalIntake',
        'as' => 'staff.officer.physical-intake',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.physical-intake.process' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/accreditation-officer/physical-intake',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@processPhysicalIntake',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@processPhysicalIntake',
        'as' => 'staff.officer.physical-intake.process',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.production-queue' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/production-queue',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@productionQueue',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@productionQueue',
        'as' => 'staff.officer.production-queue',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.applications.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/applications',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@applicationsIndex',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@applicationsIndex',
        'as' => 'staff.officer.applications.index',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.applications.new' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/applications-new',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@applicationsNew',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@applicationsNew',
        'as' => 'staff.officer.applications.new',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.applications.pending' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/applications-pending',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@applicationsPending',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@applicationsPending',
        'as' => 'staff.officer.applications.pending',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.applications.approved' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/applications-approved',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@applicationsApproved',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@applicationsApproved',
        'as' => 'staff.officer.applications.approved',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.applications.rejected' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/applications-rejected',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@applicationsRejected',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@applicationsRejected',
        'as' => 'staff.officer.applications.rejected',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.applications.bulk' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/applications-bulk',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@applicationsBulk',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@applicationsBulk',
        'as' => 'staff.officer.applications.bulk',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.applications.export' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/applications-export/{list}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@applicationsExportCsv',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@applicationsExportCsv',
        'as' => 'staff.officer.applications.export',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'list' => 'all|new|pending|approved|rejected',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.records.journalists' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/records/journalists',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@recordsJournalists',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@recordsJournalists',
        'as' => 'staff.officer.records.journalists',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.records.mediahouses' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/records/mediahouses',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@recordsMediaHouses',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@recordsMediaHouses',
        'as' => 'staff.officer.records.mediahouses',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.records.history' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/records/history',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@recordsHistory',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@recordsHistory',
        'as' => 'staff.officer.records.history',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.records.renewals' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/records/renewals',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@recordsRenewals',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@recordsRenewals',
        'as' => 'staff.officer.records.renewals',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.documents.uploaded' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/documents/uploaded',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@documentsUploaded',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@documentsUploaded',
        'as' => 'staff.officer.documents.uploaded',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.documents.pending' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/documents/pending',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@documentsPending',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@documentsPending',
        'as' => 'staff.officer.documents.pending',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.documents.verified' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/documents/verified',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@documentsVerified',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@documentsVerified',
        'as' => 'staff.officer.documents.verified',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.documents.rejected' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/documents/rejected',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@documentsRejected',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@documentsRejected',
        'as' => 'staff.officer.documents.rejected',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.renewals.expiring' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/renewals/expiring',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@renewalsExpiring',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@renewalsExpiring',
        'as' => 'staff.officer.renewals.expiring',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.renewals.expired' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/renewals/expired',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@renewalsExpired',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@renewalsExpired',
        'as' => 'staff.officer.renewals.expired',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.renewals.requests' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/renewals/requests',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@renewalsRequests',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@renewalsRequests',
        'as' => 'staff.officer.renewals.requests',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.renewals.queue' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/renewals/queue',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@renewalsQueue',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@renewalsQueue',
        'as' => 'staff.officer.renewals.queue',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.renewals.send-reminders' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/accreditation-officer/renewals/send-reminders',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@sendRenewalReminders',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@sendRenewalReminders',
        'as' => 'staff.officer.renewals.send-reminders',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.records.accredited-journalists' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/records/accredited-journalists',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@accreditedJournalists',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@accreditedJournalists',
        'as' => 'staff.officer.records.accredited-journalists',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.records.registered-mediahouses' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/records/registered-mediahouses',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@registeredMediaHouses',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@registeredMediaHouses',
        'as' => 'staff.officer.records.registered-mediahouses',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.records.send-collection-notification' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/accreditation-officer/records/send-collection-notification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@sendCollectionNotification',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@sendCollectionNotification',
        'as' => 'staff.officer.records.send-collection-notification',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.compliance.monitoring' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/compliance/monitoring',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@complianceMonitoring',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@complianceMonitoring',
        'as' => 'staff.officer.compliance.monitoring',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.compliance.violations' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/compliance/violations',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@complianceViolations',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@complianceViolations',
        'as' => 'staff.officer.compliance.violations',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.compliance.cases' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/compliance/cases',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@complianceCases',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@complianceCases',
        'as' => 'staff.officer.compliance.cases',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.compliance.unaccredited' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/compliance/unaccredited',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@complianceUnaccredited',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@complianceUnaccredited',
        'as' => 'staff.officer.compliance.unaccredited',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.reports.stats' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/reports/stats',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@reportsStats',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@reportsStats',
        'as' => 'staff.officer.reports.stats',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.reports.monthly' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/reports/monthly',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@reportsMonthly',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@reportsMonthly',
        'as' => 'staff.officer.reports.monthly',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.reports.trends' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/reports/trends',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@reportsTrends',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@reportsTrends',
        'as' => 'staff.officer.reports.trends',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.reports.compliance' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/reports/compliance',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@reportsCompliance',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@reportsCompliance',
        'as' => 'staff.officer.reports.compliance',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.comm.notices' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/comm/notices',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@commNotices',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@commNotices',
        'as' => 'staff.officer.comm.notices',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.comm.announcements' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/comm/announcements',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@commAnnouncements',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@commAnnouncements',
        'as' => 'staff.officer.comm.announcements',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.comm.memos' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/comm/memos',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@commMemos',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@commMemos',
        'as' => 'staff.officer.comm.memos',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.comm.messaging' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/comm/messaging',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@commMessaging',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@commMessaging',
        'as' => 'staff.officer.comm.messaging',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.advanced.duplicates' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/advanced/duplicates',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@advancedDuplicates',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@advancedDuplicates',
        'as' => 'staff.officer.advanced.duplicates',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.advanced.forgery' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/advanced/forgery',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@advancedForgery',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@advancedForgery',
        'as' => 'staff.officer.advanced.forgery',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.advanced.qr' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/advanced/qr',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@advancedQr',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@advancedQr',
        'as' => 'staff.officer.advanced.qr',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.advanced.audit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/advanced/audit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@advancedAudit',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@advancedAudit',
        'as' => 'staff.officer.advanced.audit',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.tools.profile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/tools/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@toolsProfile',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@toolsProfile',
        'as' => 'staff.officer.tools.profile',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.tools.tasks' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/tools/tasks',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@toolsTasks',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@toolsTasks',
        'as' => 'staff.officer.tools.tasks',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.tools.drafts' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/tools/drafts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@toolsDrafts',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@toolsDrafts',
        'as' => 'staff.officer.tools.drafts',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.officer.tools.sops' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accreditation-officer/tools/sops',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accreditation_officer',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@toolsSops',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccreditationOfficerController@toolsSops',
        'as' => 'staff.officer.tools.sops',
        'namespace' => NULL,
        'prefix' => '/staff/accreditation-officer',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.registrar.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/registrar',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:registrar',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\RegistrarController@dashboard',
        'controller' => 'App\\Http\\Controllers\\Staff\\RegistrarController@dashboard',
        'as' => 'staff.registrar.dashboard',
        'namespace' => NULL,
        'prefix' => '/staff/registrar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.registrar.incoming-queue' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/registrar/incoming-queue',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:registrar',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\RegistrarController@incomingQueue',
        'controller' => 'App\\Http\\Controllers\\Staff\\RegistrarController@incomingQueue',
        'as' => 'staff.registrar.incoming-queue',
        'namespace' => NULL,
        'prefix' => '/staff/registrar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.registrar.reports' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/registrar/reports',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:registrar',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\RegistrarController@reports',
        'controller' => 'App\\Http\\Controllers\\Staff\\RegistrarController@reports',
        'as' => 'staff.registrar.reports',
        'namespace' => NULL,
        'prefix' => '/staff/registrar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.registrar.audit-trail' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/registrar/audit-trail',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:registrar',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\RegistrarController@auditTrailSearch',
        'controller' => 'App\\Http\\Controllers\\Staff\\RegistrarController@auditTrailSearch',
        'as' => 'staff.registrar.audit-trail',
        'namespace' => NULL,
        'prefix' => '/staff/registrar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.registrar.applications.reassign-category' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/registrar/applications/{application}/reassign-category',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:registrar',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\RegistrarController@reassignCategory',
        'controller' => 'App\\Http\\Controllers\\Staff\\RegistrarController@reassignCategory',
        'as' => 'staff.registrar.applications.reassign-category',
        'namespace' => NULL,
        'prefix' => '/staff/registrar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.registrar.applications.approve-for-payment' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/registrar/applications/{application}/approve-for-payment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:registrar',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\RegistrarController@approveForPayment',
        'controller' => 'App\\Http\\Controllers\\Staff\\RegistrarController@approveForPayment',
        'as' => 'staff.registrar.applications.approve-for-payment',
        'namespace' => NULL,
        'prefix' => '/staff/registrar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.registrar.apps.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/registrar/{type}/applications/{bucket}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:registrar',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\RegistrarController@applicationsList',
        'controller' => 'App\\Http\\Controllers\\Staff\\RegistrarController@applicationsList',
        'as' => 'staff.registrar.apps.list',
        'namespace' => NULL,
        'prefix' => '/staff/registrar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'type' => 'accreditation|registration',
        'bucket' => 'new|under-review|approved|rejected|corrections',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.registrar.renewals.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/registrar/renewals/{bucket}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:registrar',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\RegistrarController@renewalsList',
        'controller' => 'App\\Http\\Controllers\\Staff\\RegistrarController@renewalsList',
        'as' => 'staff.registrar.renewals.list',
        'namespace' => NULL,
        'prefix' => '/staff/registrar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'bucket' => 'due-soon|submitted|renewed-expired',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.registrar.applications.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/registrar/applications/{application}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:registrar',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\RegistrarController@show',
        'controller' => 'App\\Http\\Controllers\\Staff\\RegistrarController@show',
        'as' => 'staff.registrar.applications.show',
        'namespace' => NULL,
        'prefix' => '/staff/registrar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.registrar.applications.approve' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/registrar/applications/{application}/approve',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:registrar',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\RegistrarController@approve',
        'controller' => 'App\\Http\\Controllers\\Staff\\RegistrarController@approve',
        'as' => 'staff.registrar.applications.approve',
        'namespace' => NULL,
        'prefix' => '/staff/registrar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.registrar.applications.reject' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/registrar/applications/{application}/reject',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:registrar',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\RegistrarController@reject',
        'controller' => 'App\\Http\\Controllers\\Staff\\RegistrarController@reject',
        'as' => 'staff.registrar.applications.reject',
        'namespace' => NULL,
        'prefix' => '/staff/registrar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.registrar.applications.return' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/registrar/applications/{application}/return',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:registrar',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\RegistrarController@returnToAccounts',
        'controller' => 'App\\Http\\Controllers\\Staff\\RegistrarController@returnToAccounts',
        'as' => 'staff.registrar.applications.return',
        'namespace' => NULL,
        'prefix' => '/staff/registrar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.registrar.renewals.send-reminders' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/registrar/renewals/send-reminders',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:registrar',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\RegistrarController@sendRenewalReminders',
        'controller' => 'App\\Http\\Controllers\\Staff\\RegistrarController@sendRenewalReminders',
        'as' => 'staff.registrar.renewals.send-reminders',
        'namespace' => NULL,
        'prefix' => '/staff/registrar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.registrar.applications.fix-request' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/registrar/applications/{application}/fix-request',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:registrar',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\RegistrarController@raiseFixRequest',
        'controller' => 'App\\Http\\Controllers\\Staff\\RegistrarController@raiseFixRequest',
        'as' => 'staff.registrar.applications.fix-request',
        'namespace' => NULL,
        'prefix' => '/staff/registrar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.registrar.applications.push-to-accounts' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/registrar/applications/{application}/push-to-accounts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:registrar',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\RegistrarController@pushToAccounts',
        'controller' => 'App\\Http\\Controllers\\Staff\\RegistrarController@pushToAccounts',
        'as' => 'staff.registrar.applications.push-to-accounts',
        'namespace' => NULL,
        'prefix' => '/staff/registrar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.registrar.accounts-oversight' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/registrar/accounts-oversight',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:registrar',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\RegistrarController@accountsOversight',
        'controller' => 'App\\Http\\Controllers\\Staff\\RegistrarController@accountsOversight',
        'as' => 'staff.registrar.accounts-oversight',
        'namespace' => NULL,
        'prefix' => '/staff/registrar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.registrar.reminders.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/registrar/reminders',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:registrar',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\RegistrarController@remindersIndex',
        'controller' => 'App\\Http\\Controllers\\Staff\\RegistrarController@remindersIndex',
        'as' => 'staff.registrar.reminders.index',
        'namespace' => NULL,
        'prefix' => '/staff/registrar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.registrar.reminders.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/registrar/reminders',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:registrar',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\RegistrarController@createReminder',
        'controller' => 'App\\Http\\Controllers\\Staff\\RegistrarController@createReminder',
        'as' => 'staff.registrar.reminders.store',
        'namespace' => NULL,
        'prefix' => '/staff/registrar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.registrar.notices-events' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/registrar/notices-events',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:registrar',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\RegistrarController@noticesEvents',
        'controller' => 'App\\Http\\Controllers\\Staff\\RegistrarController@noticesEvents',
        'as' => 'staff.registrar.notices-events',
        'namespace' => NULL,
        'prefix' => '/staff/registrar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.registrar.news' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/registrar/news',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:registrar',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\RegistrarController@news',
        'controller' => 'App\\Http\\Controllers\\Staff\\RegistrarController@news',
        'as' => 'staff.registrar.news',
        'namespace' => NULL,
        'prefix' => '/staff/registrar',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accounts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@dashboard',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@dashboard',
        'as' => 'staff.accounts.dashboard',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.payments.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accounts/payments',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@index',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@index',
        'as' => 'staff.accounts.payments.index',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.payments.retry' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accounts/payments/retry/{payment}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@retryPaymentStatus',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@retryPaymentStatus',
        'as' => 'staff.accounts.payments.retry',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.payments.offline.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accounts/payments/offline/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@createOffline',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@createOffline',
        'as' => 'staff.accounts.payments.offline.create',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.payments.offline.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/accounts/payments/offline/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@storeOffline',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@storeOffline',
        'as' => 'staff.accounts.payments.offline.store',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.payments.reverse' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/accounts/payments/{payment}/reverse',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@reverse',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@reverse',
        'as' => 'staff.accounts.payments.reverse',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.payments.refund' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/accounts/payments/{payment}/refund',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@initiateRefund',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@initiateRefund',
        'as' => 'staff.accounts.payments.refund',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.refunds.approve' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/accounts/refunds/{refund}/approve',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@approveRefund',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@approveRefund',
        'as' => 'staff.accounts.refunds.approve',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.ledger' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accounts/ledger',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@ledger',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@ledger',
        'as' => 'staff.accounts.ledger',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.reconciliation.mark' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/accounts/reconciliation/mark',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@markReconciled',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@markReconciled',
        'as' => 'staff.accounts.reconciliation.mark',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.reports.financial' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accounts/reports/financial',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@reportFinancial',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@reportFinancial',
        'as' => 'staff.accounts.reports.financial',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.paynow.transactions' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accounts/paynow-transactions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@paynowTransactions',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@paynowTransactions',
        'as' => 'staff.accounts.paynow.transactions',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.proofs.pending' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accounts/payment-proofs/pending',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@proofsPending',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@proofsPending',
        'as' => 'staff.accounts.proofs.pending',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.proofs.approved' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accounts/payment-proofs/approved',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@proofsApproved',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@proofsApproved',
        'as' => 'staff.accounts.proofs.approved',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.proofs.bulk-download' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/accounts/payment-proofs/bulk-download',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@bulkDownloadProofs',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@bulkDownloadProofs',
        'as' => 'staff.accounts.proofs.bulk-download',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.proofs.approve' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/accounts/applications/{application}/proof/approve',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@approveProof',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@approveProof',
        'as' => 'staff.accounts.proofs.approve',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.proofs.reject' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/accounts/applications/{application}/proof/reject',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@rejectProof',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@rejectProof',
        'as' => 'staff.accounts.proofs.reject',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.applications.payment.reject' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/accounts/applications/{application}/payment/reject',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@rejectPayment',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@rejectPayment',
        'as' => 'staff.accounts.applications.payment.reject',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.cash-payment.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accounts/cash-payment/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@createCashPayment',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@createCashPayment',
        'as' => 'staff.accounts.cash-payment.create',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.cash-payment.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/accounts/cash-payment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@storeCashPayment',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@storeCashPayment',
        'as' => 'staff.accounts.cash-payment.store',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.cash-payment.void' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/accounts/cash-payment/{payment}/void',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@voidCashPayment',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@voidCashPayment',
        'as' => 'staff.accounts.cash-payment.void',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.waiver-verification.approve' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/accounts/applications/{application}/waiver-verification/approve',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@approveWaiverVerification',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@approveWaiverVerification',
        'as' => 'staff.accounts.waiver-verification.approve',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.waiver-verification.reject' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/accounts/applications/{application}/waiver-verification/reject',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@rejectWaiverVerification',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@rejectWaiverVerification',
        'as' => 'staff.accounts.waiver-verification.reject',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.applications.receipt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accounts/applications/{application}/receipt',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@generateReceipt',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@generateReceipt',
        'as' => 'staff.accounts.applications.receipt',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.waivers.requests' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accounts/waivers/requests',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@waiversRequests',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@waiversRequests',
        'as' => 'staff.accounts.waivers.requests',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.waivers.approved' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accounts/waivers/approved',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@waiversApproved',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@waiversApproved',
        'as' => 'staff.accounts.waivers.approved',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.waivers.rejected' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accounts/waivers/rejected',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@waiversRejected',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@waiversRejected',
        'as' => 'staff.accounts.waivers.rejected',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.waivers.approve' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/accounts/applications/{application}/waiver/approve',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@approveWaiver',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@approveWaiver',
        'as' => 'staff.accounts.waivers.approve',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.waivers.reject' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/accounts/applications/{application}/waiver/reject',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@rejectWaiver',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@rejectWaiver',
        'as' => 'staff.accounts.waivers.reject',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.reconciliation' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accounts/reconciliation',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@reconciliation',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@reconciliation',
        'as' => 'staff.accounts.reconciliation',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.apps.paid' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accounts/applications/paid',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@applicationsPaid',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@applicationsPaid',
        'as' => 'staff.accounts.apps.paid',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.apps.pending' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accounts/applications/pending',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@applicationsPending',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@applicationsPending',
        'as' => 'staff.accounts.apps.pending',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.apps.waived' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accounts/applications/waived',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@applicationsWaived',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@applicationsWaived',
        'as' => 'staff.accounts.apps.waived',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.reports.revenue' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accounts/reports/revenue',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@reportRevenue',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@reportRevenue',
        'as' => 'staff.accounts.reports.revenue',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.reports.export-ledger' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accounts/reports/export-ledger',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@exportLedger',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@exportLedger',
        'as' => 'staff.accounts.reports.export-ledger',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.reports.exceptions' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accounts/reports/exceptions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@reportExceptions',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@reportExceptions',
        'as' => 'staff.accounts.reports.exceptions',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.reports.audit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accounts/reports/audit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@reportAudit',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@reportAudit',
        'as' => 'staff.accounts.reports.audit',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.alerts' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accounts/alerts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@alerts',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@alerts',
        'as' => 'staff.accounts.alerts',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.tools.paynow' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accounts/tools/paynow-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@paynowSettings',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@paynowSettings',
        'as' => 'staff.accounts.tools.paynow',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.tools.logs' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accounts/tools/user-action-logs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@userActionLogs',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@userActionLogs',
        'as' => 'staff.accounts.tools.logs',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.help' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accounts/help',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@help',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@help',
        'as' => 'staff.accounts.help',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.applications.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/accounts/applications/{application}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@show',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@show',
        'as' => 'staff.accounts.applications.show',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.applications.paid' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/accounts/applications/{application}/paid',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@markPaid',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@markPaid',
        'as' => 'staff.accounts.applications.paid',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.applications.return' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/accounts/applications/{application}/return',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@returnToOfficer',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@returnToOfficer',
        'as' => 'staff.accounts.applications.return',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.accounts.applications.unlock' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/accounts/applications/{application}/unlock',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:accounts_payments',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@unlock',
        'controller' => 'App\\Http\\Controllers\\Staff\\AccountsPaymentsController@unlock',
        'as' => 'staff.accounts.applications.unlock',
        'namespace' => NULL,
        'prefix' => '/staff/accounts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.production.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/production',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:production',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ProductionController@dashboard',
        'controller' => 'App\\Http\\Controllers\\Staff\\ProductionController@dashboard',
        'as' => 'staff.production.dashboard',
        'namespace' => NULL,
        'prefix' => '/staff/production',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.production.queue' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/production/queue',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:production',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ProductionController@queue',
        'controller' => 'App\\Http\\Controllers\\Staff\\ProductionController@queue',
        'as' => 'staff.production.queue',
        'namespace' => NULL,
        'prefix' => '/staff/production',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.production.cards' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/production/cards',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:production',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ProductionController@cards',
        'controller' => 'App\\Http\\Controllers\\Staff\\ProductionController@cards',
        'as' => 'staff.production.cards',
        'namespace' => NULL,
        'prefix' => '/staff/production',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.production.certificates' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/production/certificates',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:production',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ProductionController@certificates',
        'controller' => 'App\\Http\\Controllers\\Staff\\ProductionController@certificates',
        'as' => 'staff.production.certificates',
        'namespace' => NULL,
        'prefix' => '/staff/production',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.production.printing' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/production/printing',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:production',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ProductionController@printing',
        'controller' => 'App\\Http\\Controllers\\Staff\\ProductionController@printing',
        'as' => 'staff.production.printing',
        'namespace' => NULL,
        'prefix' => '/staff/production',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.production.issuance' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/production/issuance',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:production',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ProductionController@issuance',
        'controller' => 'App\\Http\\Controllers\\Staff\\ProductionController@issuance',
        'as' => 'staff.production.issuance',
        'namespace' => NULL,
        'prefix' => '/staff/production',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.production.registers.issued' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/production/registers/issued',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:production',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ProductionController@issuedRegister',
        'controller' => 'App\\Http\\Controllers\\Staff\\ProductionController@issuedRegister',
        'as' => 'staff.production.registers.issued',
        'namespace' => NULL,
        'prefix' => '/staff/production',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.production.reports' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/production/reports',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:production',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ProductionController@reports',
        'controller' => 'App\\Http\\Controllers\\Staff\\ProductionController@reports',
        'as' => 'staff.production.reports',
        'namespace' => NULL,
        'prefix' => '/staff/production',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.production.applications.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/production/applications/{application}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:production',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ProductionController@show',
        'controller' => 'App\\Http\\Controllers\\Staff\\ProductionController@show',
        'as' => 'staff.production.applications.show',
        'namespace' => NULL,
        'prefix' => '/staff/production',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.production.applications.card.preview' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/production/applications/{application}/card/preview',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:production',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ProductionController@cardPreview',
        'controller' => 'App\\Http\\Controllers\\Staff\\ProductionController@cardPreview',
        'as' => 'staff.production.applications.card.preview',
        'namespace' => NULL,
        'prefix' => '/staff/production',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.production.applications.card.print' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/production/applications/{application}/card/print',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:production',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ProductionController@cardPrint',
        'controller' => 'App\\Http\\Controllers\\Staff\\ProductionController@cardPrint',
        'as' => 'staff.production.applications.card.print',
        'namespace' => NULL,
        'prefix' => '/staff/production',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.production.applications.card.print_back' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/production/applications/{application}/card/print-back',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:production',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ProductionController@cardPrintBack',
        'controller' => 'App\\Http\\Controllers\\Staff\\ProductionController@cardPrintBack',
        'as' => 'staff.production.applications.card.print_back',
        'namespace' => NULL,
        'prefix' => '/staff/production',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.production.applications.certificate.preview' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/production/applications/{application}/certificate/preview',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:production',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ProductionController@certificatePreview',
        'controller' => 'App\\Http\\Controllers\\Staff\\ProductionController@certificatePreview',
        'as' => 'staff.production.applications.certificate.preview',
        'namespace' => NULL,
        'prefix' => '/staff/production',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.production.applications.certificate.print' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/production/applications/{application}/certificate/print',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:production',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ProductionController@certificatePrint',
        'controller' => 'App\\Http\\Controllers\\Staff\\ProductionController@certificatePrint',
        'as' => 'staff.production.applications.certificate.print',
        'namespace' => NULL,
        'prefix' => '/staff/production',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.production.applications.generate_card' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/production/applications/{application}/generate-card',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:production',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ProductionController@generateCard',
        'controller' => 'App\\Http\\Controllers\\Staff\\ProductionController@generateCard',
        'as' => 'staff.production.applications.generate_card',
        'namespace' => NULL,
        'prefix' => '/staff/production',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.production.applications.generate_certificate' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/production/applications/{application}/generate-certificate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:production',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ProductionController@generateCertificate',
        'controller' => 'App\\Http\\Controllers\\Staff\\ProductionController@generateCertificate',
        'as' => 'staff.production.applications.generate_certificate',
        'namespace' => NULL,
        'prefix' => '/staff/production',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.production.applications.print_single' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/production/applications/{application}/print',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:production',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ProductionController@printSingle',
        'controller' => 'App\\Http\\Controllers\\Staff\\ProductionController@printSingle',
        'as' => 'staff.production.applications.print_single',
        'namespace' => NULL,
        'prefix' => '/staff/production',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.production.batch.print' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/production/batch/print',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:production',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ProductionController@printBatch',
        'controller' => 'App\\Http\\Controllers\\Staff\\ProductionController@printBatch',
        'as' => 'staff.production.batch.print',
        'namespace' => NULL,
        'prefix' => '/staff/production',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.production.applications.issue' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/production/applications/{application}/issue',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:production',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ProductionController@markIssued',
        'controller' => 'App\\Http\\Controllers\\Staff\\ProductionController@markIssued',
        'as' => 'staff.production.applications.issue',
        'namespace' => NULL,
        'prefix' => '/staff/production',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.production.applications.unlock' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/production/applications/{application}/unlock',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:production',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ProductionController@unlock',
        'controller' => 'App\\Http\\Controllers\\Staff\\ProductionController@unlock',
        'as' => 'staff.production.applications.unlock',
        'namespace' => NULL,
        'prefix' => '/staff/production',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.production.designer' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/production/designer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:production',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ProductionController@designer',
        'controller' => 'App\\Http\\Controllers\\Staff\\ProductionController@designer',
        'as' => 'staff.production.designer',
        'namespace' => NULL,
        'prefix' => '/staff/production',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.production.templates' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/production/templates',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:production',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ProductionController@templates',
        'controller' => 'App\\Http\\Controllers\\Staff\\ProductionController@templates',
        'as' => 'staff.production.templates',
        'namespace' => NULL,
        'prefix' => '/staff/production',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.production.templates.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/production/templates',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:production',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ProductionController@storeTemplate',
        'controller' => 'App\\Http\\Controllers\\Staff\\ProductionController@storeTemplate',
        'as' => 'staff.production.templates.store',
        'namespace' => NULL,
        'prefix' => '/staff/production',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.production.templates.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'staff/production/templates/{template}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:production',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ProductionController@updateTemplate',
        'controller' => 'App\\Http\\Controllers\\Staff\\ProductionController@updateTemplate',
        'as' => 'staff.production.templates.update',
        'namespace' => NULL,
        'prefix' => '/staff/production',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.production.templates.activate' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/production/templates/{template}/activate',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:production',
          4 => 'block.director.operational',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ProductionController@activateTemplate',
        'controller' => 'App\\Http\\Controllers\\Staff\\ProductionController@activateTemplate',
        'as' => 'staff.production.templates.activate',
        'namespace' => NULL,
        'prefix' => '/staff/production',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/it',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@index',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@index',
        'as' => 'staff.it.dashboard',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.users.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/it/users/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItAdminController@createUser',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItAdminController@createUser',
        'as' => 'staff.it.users.create',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.users.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/it/users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItAdminController@storeUser',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItAdminController@storeUser',
        'as' => 'staff.it.users.store',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.regions.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/it/regions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItAdminController@storeRegion',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItAdminController@storeRegion',
        'as' => 'staff.it.regions.store',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.regions.toggle' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/it/regions/{region}/toggle',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItAdminController@toggleRegion',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItAdminController@toggleRegion',
        'as' => 'staff.it.regions.toggle',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.notices.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/it/notices',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ContentController@storeNotice',
        'controller' => 'App\\Http\\Controllers\\Admin\\ContentController@storeNotice',
        'as' => 'staff.it.notices.store',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.notices.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/it/notices/{notice}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ContentController@updateNotice',
        'controller' => 'App\\Http\\Controllers\\Admin\\ContentController@updateNotice',
        'as' => 'staff.it.notices.update',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.notices.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'staff/it/notices/{notice}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ContentController@destroyNotice',
        'controller' => 'App\\Http\\Controllers\\Admin\\ContentController@destroyNotice',
        'as' => 'staff.it.notices.destroy',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.events.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/it/events',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ContentController@storeEvent',
        'controller' => 'App\\Http\\Controllers\\Admin\\ContentController@storeEvent',
        'as' => 'staff.it.events.store',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.events.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/it/events/{event}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ContentController@updateEvent',
        'controller' => 'App\\Http\\Controllers\\Admin\\ContentController@updateEvent',
        'as' => 'staff.it.events.update',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.events.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'staff/it/events/{event}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ContentController@destroyEvent',
        'controller' => 'App\\Http\\Controllers\\Admin\\ContentController@destroyEvent',
        'as' => 'staff.it.events.destroy',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.vacancies.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/it/vacancies',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ContentController@storeVacancy',
        'controller' => 'App\\Http\\Controllers\\Admin\\ContentController@storeVacancy',
        'as' => 'staff.it.vacancies.store',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.vacancies.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/it/vacancies/{vacancy}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ContentController@updateVacancy',
        'controller' => 'App\\Http\\Controllers\\Admin\\ContentController@updateVacancy',
        'as' => 'staff.it.vacancies.update',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.vacancies.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'staff/it/vacancies/{vacancy}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ContentController@destroyVacancy',
        'controller' => 'App\\Http\\Controllers\\Admin\\ContentController@destroyVacancy',
        'as' => 'staff.it.vacancies.destroy',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.tenders.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/it/tenders',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ContentController@storeTender',
        'controller' => 'App\\Http\\Controllers\\Admin\\ContentController@storeTender',
        'as' => 'staff.it.tenders.store',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.tenders.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/it/tenders/{tender}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ContentController@updateTender',
        'controller' => 'App\\Http\\Controllers\\Admin\\ContentController@updateTender',
        'as' => 'staff.it.tenders.update',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.tenders.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'staff/it/tenders/{tender}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ContentController@destroyTender',
        'controller' => 'App\\Http\\Controllers\\Admin\\ContentController@destroyTender',
        'as' => 'staff.it.tenders.destroy',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.applicants.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/it/applicants',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItAdminController@listApplicants',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItAdminController@listApplicants',
        'as' => 'staff.it.applicants.list',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.applicants.reset' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/it/applicants/{user}/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItAdminController@resetApplicant',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItAdminController@resetApplicant',
        'as' => 'staff.it.applicants.reset',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.monitoring' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/it/monitoring',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@monitoring',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@monitoring',
        'as' => 'staff.it.monitoring',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.drafts' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/it/drafts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@drafts',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@drafts',
        'as' => 'staff.it.drafts',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.files' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/it/files',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@files',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@files',
        'as' => 'staff.it.files',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.errors' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/it/errors',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@errors',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@errors',
        'as' => 'staff.it.errors',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.users-mgmt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/it/users-mgmt',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@users',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@users',
        'as' => 'staff.it.users-mgmt',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.workflow-mgmt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/it/workflow-mgmt',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@workflow',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@workflow',
        'as' => 'staff.it.workflow-mgmt',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.accreditation-mgmt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/it/accreditation-mgmt',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@accreditation',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@accreditation',
        'as' => 'staff.it.accreditation-mgmt',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.notifications-mgmt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/it/notifications-mgmt',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@notifications',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@notifications',
        'as' => 'staff.it.notifications-mgmt',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.payments-mgmt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/it/payments-mgmt',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@payments',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@payments',
        'as' => 'staff.it.payments-mgmt',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.security-mgmt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/it/security-mgmt',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@security',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@security',
        'as' => 'staff.it.security-mgmt',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.backup-mgmt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/it/backup-mgmt',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@backup',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@backup',
        'as' => 'staff.it.backup-mgmt',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.audit-mgmt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/it/audit-mgmt',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@audit',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@audit',
        'as' => 'staff.it.audit-mgmt',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.system-mgmt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/it/system-mgmt',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@system',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@system',
        'as' => 'staff.it.system-mgmt',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.performance-mgmt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/it/performance-mgmt',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@performance',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@performance',
        'as' => 'staff.it.performance-mgmt',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.reports-mgmt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/it/reports-mgmt',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@reports',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@reports',
        'as' => 'staff.it.reports-mgmt',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.mediahouses-mgmt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/it/mediahouses-mgmt',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@mediahouses',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@mediahouses',
        'as' => 'staff.it.mediahouses-mgmt',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.application.overview' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/it/application-overview/{application}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@showApplication',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@showApplication',
        'as' => 'staff.it.application.overview',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.application.download_batch' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/it/application-overview/{application}/download-batch',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@downloadBatch',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@downloadBatch',
        'as' => 'staff.it.application.download_batch',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.application.unlock' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/it/application/{application}/unlock',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@unlockApplication',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@unlockApplication',
        'as' => 'staff.it.application.unlock',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.application.reset' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/it/application/{application}/reset',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@resetApplication',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@resetApplication',
        'as' => 'staff.it.application.reset',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.user.suspend' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/it/user/{user}/suspend',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@suspendUser',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@suspendUser',
        'as' => 'staff.it.user.suspend',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.user.reset_password' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/it/user/{user}/reset-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@forcePasswordReset',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@forcePasswordReset',
        'as' => 'staff.it.user.reset_password',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.config.save' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/it/config/save',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@saveConfig',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@saveConfig',
        'as' => 'staff.it.config.save',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.fees.sync' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/it/fees/sync',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@syncFees',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@syncFees',
        'as' => 'staff.it.fees.sync',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.fees.save' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/it/fees/save',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@saveFee',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@saveFee',
        'as' => 'staff.it.fees.save',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.notifications.template.save' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/it/notifications/template/save',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@saveNotificationTemplate',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@saveNotificationTemplate',
        'as' => 'staff.it.notifications.template.save',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.payments.process_queue' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/it/payments/process-queue',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@processPaymentQueue',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@processPaymentQueue',
        'as' => 'staff.it.payments.process_queue',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.system.backup' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/it/system/backup',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@triggerBackup',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@triggerBackup',
        'as' => 'staff.it.system.backup',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.system.clear_cache' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/it/system/clear-cache',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@clearCache',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@clearCache',
        'as' => 'staff.it.system.clear_cache',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.system.cleanup' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/it/system/cleanup',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@runCleanup',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@runCleanup',
        'as' => 'staff.it.system.cleanup',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.security.session.logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/it/security/session/{id}/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@logoutSession',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@logoutSession',
        'as' => 'staff.it.security.session.logout',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.security.ip.block' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/it/security/ip/block',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@blockIp',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@blockIp',
        'as' => 'staff.it.security.ip.block',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.security.toggle_rate_limiting' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/it/security/toggle-rate-limiting',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@toggleRateLimiting',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@toggleRateLimiting',
        'as' => 'staff.it.security.toggle_rate_limiting',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.security.ssl_audit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/it/security/ssl-audit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@sslAudit',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@sslAudit',
        'as' => 'staff.it.security.ssl_audit',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.reports.generate' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/it/reports/generate/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@generateReport',
        'controller' => 'App\\Http\\Controllers\\Staff\\ItDashboardController@generateReport',
        'as' => 'staff.it.reports.generate',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.it.' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/it/command-center',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:it_admin|super_admin',
        ),
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:48:"fn() => \\redirect()->route(\'staff.it.dashboard\')";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000004210000000000000000";}}',
        'as' => 'staff.it.',
        'namespace' => NULL,
        'prefix' => '/staff/it',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.auditor.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/auditor',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:auditor|director|super_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AuditorController@dashboard',
        'controller' => 'App\\Http\\Controllers\\Staff\\AuditorController@dashboard',
        'as' => 'staff.auditor.dashboard',
        'namespace' => NULL,
        'prefix' => '/staff/auditor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.auditor.analytics' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/auditor/analytics',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:auditor|director|super_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AuditorController@analytics',
        'controller' => 'App\\Http\\Controllers\\Staff\\AuditorController@analytics',
        'as' => 'staff.auditor.analytics',
        'namespace' => NULL,
        'prefix' => '/staff/auditor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.auditor.logins' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/auditor/logins',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:auditor|director|super_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AuditorController@logins',
        'controller' => 'App\\Http\\Controllers\\Staff\\AuditorController@logins',
        'as' => 'staff.auditor.logins',
        'namespace' => NULL,
        'prefix' => '/staff/auditor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.auditor.logins.csv' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/auditor/logins.csv',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:auditor|director|super_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AuditorController@loginsCsv',
        'controller' => 'App\\Http\\Controllers\\Staff\\AuditorController@loginsCsv',
        'as' => 'staff.auditor.logins.csv',
        'namespace' => NULL,
        'prefix' => '/staff/auditor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.auditor.applications' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/auditor/applications',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:auditor|director|super_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AuditorController@applications',
        'controller' => 'App\\Http\\Controllers\\Staff\\AuditorController@applications',
        'as' => 'staff.auditor.applications',
        'namespace' => NULL,
        'prefix' => '/staff/auditor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.auditor.applications.csv' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/auditor/applications.csv',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:auditor|director|super_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AuditorController@applicationsCsv',
        'controller' => 'App\\Http\\Controllers\\Staff\\AuditorController@applicationsCsv',
        'as' => 'staff.auditor.applications.csv',
        'namespace' => NULL,
        'prefix' => '/staff/auditor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.auditor.paynow' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/auditor/payments/paynow',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:auditor|director|super_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AuditorController@paynow',
        'controller' => 'App\\Http\\Controllers\\Staff\\AuditorController@paynow',
        'as' => 'staff.auditor.paynow',
        'namespace' => NULL,
        'prefix' => '/staff/auditor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.auditor.paynow.csv' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/auditor/payments/paynow.csv',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:auditor|director|super_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AuditorController@paynowCsv',
        'controller' => 'App\\Http\\Controllers\\Staff\\AuditorController@paynowCsv',
        'as' => 'staff.auditor.paynow.csv',
        'namespace' => NULL,
        'prefix' => '/staff/auditor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.auditor.proofs' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/auditor/payments/proofs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:auditor|director|super_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AuditorController@proofs',
        'controller' => 'App\\Http\\Controllers\\Staff\\AuditorController@proofs',
        'as' => 'staff.auditor.proofs',
        'namespace' => NULL,
        'prefix' => '/staff/auditor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.auditor.proofs.csv' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/auditor/payments/proofs.csv',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:auditor|director|super_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AuditorController@proofsCsv',
        'controller' => 'App\\Http\\Controllers\\Staff\\AuditorController@proofsCsv',
        'as' => 'staff.auditor.proofs.csv',
        'namespace' => NULL,
        'prefix' => '/staff/auditor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.auditor.waivers' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/auditor/payments/waivers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:auditor|director|super_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AuditorController@waivers',
        'controller' => 'App\\Http\\Controllers\\Staff\\AuditorController@waivers',
        'as' => 'staff.auditor.waivers',
        'namespace' => NULL,
        'prefix' => '/staff/auditor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.auditor.waivers.csv' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/auditor/payments/waivers.csv',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:auditor|director|super_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AuditorController@waiversCsv',
        'controller' => 'App\\Http\\Controllers\\Staff\\AuditorController@waiversCsv',
        'as' => 'staff.auditor.waivers.csv',
        'namespace' => NULL,
        'prefix' => '/staff/auditor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.auditor.logs' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/auditor/logs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:auditor|director|super_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AuditorController@logs',
        'controller' => 'App\\Http\\Controllers\\Staff\\AuditorController@logs',
        'as' => 'staff.auditor.logs',
        'namespace' => NULL,
        'prefix' => '/staff/auditor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.auditor.logs.csv' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/auditor/logs.csv',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:auditor|director|super_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AuditorController@logsCsv',
        'controller' => 'App\\Http\\Controllers\\Staff\\AuditorController@logsCsv',
        'as' => 'staff.auditor.logs.csv',
        'namespace' => NULL,
        'prefix' => '/staff/auditor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.auditor.reports' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/auditor/reports',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:auditor|director|super_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AuditorController@reports',
        'controller' => 'App\\Http\\Controllers\\Staff\\AuditorController@reports',
        'as' => 'staff.auditor.reports',
        'namespace' => NULL,
        'prefix' => '/staff/auditor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.auditor.reports.csv' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/auditor/reports.csv',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:auditor|director|super_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AuditorController@reportsCsv',
        'controller' => 'App\\Http\\Controllers\\Staff\\AuditorController@reportsCsv',
        'as' => 'staff.auditor.reports.csv',
        'namespace' => NULL,
        'prefix' => '/staff/auditor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.auditor.security' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/auditor/security',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:auditor|director|super_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AuditorController@security',
        'controller' => 'App\\Http\\Controllers\\Staff\\AuditorController@security',
        'as' => 'staff.auditor.security',
        'namespace' => NULL,
        'prefix' => '/staff/auditor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.auditor.security.csv' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/auditor/security.csv',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:auditor|director|super_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AuditorController@securityCsv',
        'controller' => 'App\\Http\\Controllers\\Staff\\AuditorController@securityCsv',
        'as' => 'staff.auditor.security.csv',
        'namespace' => NULL,
        'prefix' => '/staff/auditor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.auditor.activity.csv' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/auditor/activity.csv',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:auditor|director|super_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AuditorController@activityCsv',
        'controller' => 'App\\Http\\Controllers\\Staff\\AuditorController@activityCsv',
        'as' => 'staff.auditor.activity.csv',
        'namespace' => NULL,
        'prefix' => '/staff/auditor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.auditor.flag' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/auditor/flag',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:auditor|director|super_admin|registrar',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\AuditorController@flag',
        'controller' => 'App\\Http\\Controllers\\Staff\\AuditorController@flag',
        'as' => 'staff.auditor.flag',
        'namespace' => NULL,
        'prefix' => '/staff/auditor',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.director.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/director',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:director',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\DirectorController@dashboard',
        'controller' => 'App\\Http\\Controllers\\Staff\\DirectorController@dashboard',
        'as' => 'staff.director.dashboard',
        'namespace' => NULL,
        'prefix' => '/staff/director',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.director.reports.accreditation' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/director/reports/accreditation',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:director',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\DirectorController@accreditationPerformance',
        'controller' => 'App\\Http\\Controllers\\Staff\\DirectorController@accreditationPerformance',
        'as' => 'staff.director.reports.accreditation',
        'namespace' => NULL,
        'prefix' => '/staff/director',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.director.reports.financial' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/director/reports/financial',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:director',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\DirectorController@financialOverview',
        'controller' => 'App\\Http\\Controllers\\Staff\\DirectorController@financialOverview',
        'as' => 'staff.director.reports.financial',
        'namespace' => NULL,
        'prefix' => '/staff/director',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.director.reports.compliance' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/director/reports/compliance',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:director',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\DirectorController@complianceRisk',
        'controller' => 'App\\Http\\Controllers\\Staff\\DirectorController@complianceRisk',
        'as' => 'staff.director.reports.compliance',
        'namespace' => NULL,
        'prefix' => '/staff/director',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.director.reports.mediahouses' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/director/reports/mediahouses',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:director',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\DirectorController@mediaHouseOversight',
        'controller' => 'App\\Http\\Controllers\\Staff\\DirectorController@mediaHouseOversight',
        'as' => 'staff.director.reports.mediahouses',
        'namespace' => NULL,
        'prefix' => '/staff/director',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.director.reports.staff' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/director/reports/staff',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:director',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\DirectorController@staffPerformance',
        'controller' => 'App\\Http\\Controllers\\Staff\\DirectorController@staffPerformance',
        'as' => 'staff.director.reports.staff',
        'namespace' => NULL,
        'prefix' => '/staff/director',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.director.reports.issuance' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/director/reports/issuance',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:director',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\DirectorController@issuanceOversight',
        'controller' => 'App\\Http\\Controllers\\Staff\\DirectorController@issuanceOversight',
        'as' => 'staff.director.reports.issuance',
        'namespace' => NULL,
        'prefix' => '/staff/director',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.director.reports.geographic' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/director/reports/geographic',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:director',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\DirectorController@geographicDistribution',
        'controller' => 'App\\Http\\Controllers\\Staff\\DirectorController@geographicDistribution',
        'as' => 'staff.director.reports.geographic',
        'namespace' => NULL,
        'prefix' => '/staff/director',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.director.reports.downloads' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'staff/director/reports/downloads',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:director',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\DirectorController@reportsDownloads',
        'controller' => 'App\\Http\\Controllers\\Staff\\DirectorController@reportsDownloads',
        'as' => 'staff.director.reports.downloads',
        'namespace' => NULL,
        'prefix' => '/staff/director',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.director.generate.monthly-accreditation' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/director/generate/monthly-accreditation',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:director',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\DirectorController@generateMonthlyAccreditationReport',
        'controller' => 'App\\Http\\Controllers\\Staff\\DirectorController@generateMonthlyAccreditationReport',
        'as' => 'staff.director.generate.monthly-accreditation',
        'namespace' => NULL,
        'prefix' => '/staff/director',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.director.generate.revenue-financial' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/director/generate/revenue-financial',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:director',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\DirectorController@generateRevenueFinancialReport',
        'controller' => 'App\\Http\\Controllers\\Staff\\DirectorController@generateRevenueFinancialReport',
        'as' => 'staff.director.generate.revenue-financial',
        'namespace' => NULL,
        'prefix' => '/staff/director',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.director.generate.compliance-audit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/director/generate/compliance-audit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:director',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\DirectorController@generateComplianceAuditReport',
        'controller' => 'App\\Http\\Controllers\\Staff\\DirectorController@generateComplianceAuditReport',
        'as' => 'staff.director.generate.compliance-audit',
        'namespace' => NULL,
        'prefix' => '/staff/director',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.director.generate.mediahouse-status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/director/generate/mediahouse-status',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:director',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\DirectorController@generateMediaHouseStatusReport',
        'controller' => 'App\\Http\\Controllers\\Staff\\DirectorController@generateMediaHouseStatusReport',
        'as' => 'staff.director.generate.mediahouse-status',
        'namespace' => NULL,
        'prefix' => '/staff/director',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'staff.director.generate.operational-performance' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'staff/director/generate/operational-performance',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'staff.portal',
          3 => 'role:director',
        ),
        'uses' => 'App\\Http\\Controllers\\Staff\\DirectorController@generateOperationalPerformanceReport',
        'controller' => 'App\\Http\\Controllers\\Staff\\DirectorController@generateOperationalPerformanceReport',
        'as' => 'staff.director.generate.operational-performance',
        'namespace' => NULL,
        'prefix' => '/staff/director',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'chatbot.message' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'chatbot/message',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => 'App\\Http\\Controllers\\ChatbotController@message',
        'controller' => 'App\\Http\\Controllers\\ChatbotController@message',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'chatbot.message',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'public.verify' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'verify/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\PublicVerificationController@verify',
        'controller' => 'App\\Http\\Controllers\\PublicVerificationController@verify',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'public.verify',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'storage.local' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'storage/{path}',
      'action' => 
      array (
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:3:{s:4:"disk";s:5:"local";s:6:"config";a:5:{s:6:"driver";s:5:"local";s:4:"root";s:42:"/home/runner/workspace/storage/app/private";s:5:"serve";b:1;s:5:"throw";b:0;s:6:"report";b:0;}s:12:"isProduction";b:0;}s:8:"function";s:323:"function (\\Illuminate\\Http\\Request $request, string $path) use ($disk, $config, $isProduction) {
                    return (new \\Illuminate\\Filesystem\\ServeFile(
                        $disk,
                        $config,
                        $isProduction
                    ))($request, $path);
                }";s:5:"scope";s:47:"Illuminate\\Filesystem\\FilesystemServiceProvider";s:4:"this";N;s:4:"self";s:32:"00000000000005700000000000000000";}}',
        'as' => 'storage.local',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'path' => '.*',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);

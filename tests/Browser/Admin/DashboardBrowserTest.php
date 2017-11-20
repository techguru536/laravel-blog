<?php

namespace Tests\Browser\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\BrowserKitTest;

class DashboardBrowserTest extends BrowserKitTest
{
    use RefreshDatabase;

    public function testDashboardPostsIndexLink()
    {
        $this->actingAs($this->admin())
            ->visit('/admin/dashboard')
            ->click('Articles')
            ->seeRouteIs('admin.posts.index');
    }

    public function testDashboardCommentsIndexLink()
    {
        $this->actingAs($this->admin())
            ->visit('/admin/dashboard')
            ->click('Commentaires')
            ->seeRouteIs('admin.comments.index');
    }

    public function testDashboardUsersIndexLink()
    {
        $this->actingAs($this->admin())
            ->visit('/admin/dashboard')
            ->click('Utilisateurs')
            ->seeRouteIs('admin.users.index');
    }
}

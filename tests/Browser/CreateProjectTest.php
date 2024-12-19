<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\LoginHelper;

class CreateProjectTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function test_example(): void
    {

        $this->browse(function (Browser $browser) {

            $user = User::find(1);

            LoginHelper::loginAs($browser, $user)
                ->visit('http://localhost:8000')
                ->assertSee('Создать проект')
                ->press('Создать проект')
                ->whenAvailable('#createProjectModal', function (Browser $modal) {
                    $modal->assertSee('Создать проект')
                        ->type('name', fake()->unique()->realTextBetween(10, 25))
                        ->type('description', 'Описание нового проекта')
                        ->attach('image', 'public/static/images/project_placeholder.jpg')
                        ->script('tagify.addTags(["it", "tag2", "randomtag"]);');
                    $modal->screenshot('createProjectTest')
                        ->select('participants', '3')
                        ->select('format_id', '2')
                        ->select('age_limit_id', '3')
                        ->screenshot('createProjectTest2')
                        ->press('Создать проект')
                        ->screenshot('createProjectTest3');

                });
        });
    }
}

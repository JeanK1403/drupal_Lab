<?php

namespace Drupal\Tests\profile\Functional;

use Drupal\profile\Entity\Profile;
use Drupal\profile\Entity\ProfileType;
use Drupal\user\Entity\User;

/**
 * Tests "default" functionality via the UI.
 *
 * @group profile
 */
class ProfileDefaultTest extends ProfileTestBase {
  /**
   * Testing demo user 1.
   *
   * @var \Drupal\user\UserInterface
   */
  public $user1;

  /**
   * Testing demo user 2.
   *
   * @var \Drupal\user\UserInterface;
   */
  public $user2;

  /**
   * Profile entity storage.
   *
   * @var \Drupal\profile\ProfileStorageInterface
   */
  public $profileStorage;

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();

    $this->adminUser = $this->drupalCreateUser([
      'access user profiles',
      'administer profile',
      'administer profile types',
      'access administration pages',
    ]);

    $this->user1 = User::create([
      'name' => $this->randomMachineName(),
      'mail' => $this->randomMachineName() . '@example.com',
    ]);
    $this->user1->save();
    $this->user2 = User::create([
      'name' => $this->randomMachineName(),
      'mail' => $this->randomMachineName() . '@example.com',
    ]);
    $this->user2->save();
  }

  /**
   * Tests whether profile default on edit is working.
   */
  public function testProfileEdit() {
    $type = ProfileType::create([
      'id' => $this->randomMachineName(),
      'label' => $this->randomMachineName(),
      'registration' => FALSE,
      'roles' => [],
      'multiple' => TRUE,
    ]);
    $type->save();

    $admin_user = $this->drupalCreateUser([
      'administer profile',
      'administer users',
    ]);

    // Create new profiles.
    $profile1 = Profile::create([
      'type' => $type->id(),
      'uid' => $this->user1->id(),
    ]);
    $profile1->save();
    $profile2 = Profile::create([
      'type' => $type->id(),
      'uid' => $this->user1->id(),
    ]);
    $profile2->save();

    // Verify that the first profile of this type is default.
    $this->assertTrue($profile1->isDefault());
    $this->assertFalse($profile2->isDefault());

    $this->drupalLogin($admin_user);

    $this->drupalGet($profile1->toUrl('edit-form')->toString());
    $this->assertSession()->buttonNotExists('Save and make default');

    $this->drupalGet($profile2->toUrl('edit-form')->toString());
    $this->assertSession()->buttonExists('Save and make default');
    $this->submitForm([], 'Save and make default');

    \Drupal::entityTypeManager()->getStorage('profile')->resetCache([$profile1->id(), $profile2->id()]);
    $this->assertFalse(Profile::load($profile1->id())->isDefault());
    $this->assertTrue(Profile::load($profile2->id())->isDefault());
  }

}

<div class="fab fab-flower">
    <!-- a focusable div with tabindex is necessary to work on all browsers. role="button" is necessary for accessibility -->
    <div tabindex="0" role="button" class="btn btn-lg btn-success btn-circle">F</div>

    <!-- Main Action button replaces the original button when FAB is open -->
    <button class="fab-main-action btn btn-circle btn-lg btn-success">M</button>

    <!-- buttons that show up when FAB is open -->
    <div class="tooltip tooltip-left" data-tip="Label A">
        <button class="btn btn-lg btn-circle">A</button>
    </div>
    <div class="tooltip tooltip-left" data-tip="Label B">
        <button class="btn btn-lg btn-circle">B</button>
    </div>
    <div class="tooltip" data-tip="Label C">
        <button class="btn btn-lg btn-circle">C</button>
    </div>
    <div class="tooltip" data-tip="Label D">
        <button class="btn btn-lg btn-circle">D</button>
    </div>
</div>

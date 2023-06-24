<style>
    .flash-message {
        position: fixed;
        z-index: 2000;
        top: 10px;
        left: 50%;
        transform: translateX(-50%);
        background: #eee;
        box-shadow: 2px 5px 10px #bbb;
        color: #0016ff;
        inline-size: 280px;
        min-block-size: 50px;
        padding: .2rem;
        border-radius: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;

    }
</style>
<?php if (isset($_SESSION['flash-message'])) : ?>

    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2500)" x-show="show" class="flash-message">
        <?= $_SESSION['flash-message']; ?>
        <?php unset($_SESSION['flash-message']); ?>
    </div>

<?php endif; ?>
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
            {{-- (Request::is('dashboard') > 'active':'') kalau requestnya ke url page dashboard, maka tambahkan class active, kalau engga, tidak menambahkan class active--}}
          <a class="nav-link {{ Request::is('dashboard') ? 'active':'' }}" aria-current="page" href="/dashboard">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>

        <li class="nav-item">
            {{-- 'dashboard/posts/*' apa pun yg ada setelah posts/ , akan membuat link ini active --}}
          <a class="nav-link {{ Request::is('dashboard/testcases/*') ? 'active':'' }}" href="/dashboard/testcases">

            {{-- data-feather ini mengambil dari https://feathericons.com/ . udah ada ngelink ke sana --}}
            <span data-feather="file-text"></span>
            My Testcase
          </a>
        </li>
      </ul>
    </div>
  </nav>
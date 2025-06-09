# Website Flowchart for InventarisRPL

```mermaid
flowchart TD
    Start([Start])
    VisitSite[User visits site]
    LoginPage[Login Page]
    AuthCheck{Is Authenticated?}
    RoleCheck{Is Admin or Has Dashboard Permission?}
    AdminDashboard[Admin Dashboard]
    UserHome[User Home Page (Laptop List)]
    LaptopDetail[Laptop Detail Page]
    BorrowLaptop[Borrow Laptop]
    UserManagement[User Management (CRUD)]
    LaptopManagement[Laptop Management (CRUD)]
    PeminjamanManagement[Peminjaman Management (CRUD)]
    Logout[Logout]
    End([End])

    Start --> VisitSite --> LoginPage
    LoginPage --> AuthCheck
    AuthCheck -- No --> LoginPage
    AuthCheck -- Yes --> RoleCheck
    RoleCheck -- Yes --> AdminDashboard
    RoleCheck -- No --> UserHome

    UserHome --> LaptopDetail
    LaptopDetail --> BorrowLaptop
    BorrowLaptop --> UserHome

    AdminDashboard --> UserManagement
    AdminDashboard --> LaptopManagement
    AdminDashboard --> PeminjamanManagement

    UserManagement --> AdminDashboard
    LaptopManagement --> AdminDashboard
    PeminjamanManagement --> AdminDashboard

    AdminDashboard --> Logout
    UserHome --> Logout
    Logout --> End
```

This flowchart represents the main user and admin flows of the InventarisRPL website:
- Users must login to access the site.
- Authenticated users with admin or dashboard permission are redirected to the admin dashboard.
- Other users see the home page with a list of laptops.
- Users can view laptop details and borrow laptops.
- Admins can manage users, laptops, and peminjaman records with full CRUD operations.
- Both flows end with logout.

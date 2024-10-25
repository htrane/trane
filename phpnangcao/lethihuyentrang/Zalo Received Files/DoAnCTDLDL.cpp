
#include<iostream>
#include<string>
#include<fstream>
#include<string.h>
#include<conio.h>
#include<stdlib.h>
#include<Windows.h>
#pragma warning(disable:4996)
#pragma warning(disable:4018)
#pragma warning(disable:6031)

using namespace std;
void textcolor(WORD color)
{
    HANDLE hConsoleOutput;
    hConsoleOutput = GetStdHandle(STD_OUTPUT_HANDLE);

    CONSOLE_SCREEN_BUFFER_INFO screen_buffer_info;
    GetConsoleScreenBufferInfo(hConsoleOutput, &screen_buffer_info);

    WORD wAttributes = screen_buffer_info.wAttributes;
    color &= 0x000f;
    wAttributes &= 0xfff0;
    wAttributes |= color;

    SetConsoleTextAttribute(hConsoleOutput, wAttributes);
}
class User
{
protected:
    string Username;
    string Password;

    string Name;
    string Address;
    string Phone;
    string Email;
public:
    string getUsername() { return Username; }
    string getPassword() { return Password; }
    string getName() { return Name; }
    string getAddress() { return Address; }
    string getPhone() { return Phone; }
    string getEmail() { return Email; }
    void setUsername(string _Username) { Username = _Username; }
    void setPassword(string _Password) { Password = _Password; }
    void setName(string _Name) { Name = _Name; }
    void setAddress(string _Address) { Address = _Address; }
    void setPhone(string _Phone) { Name = _Phone; }
    void setEmail(string _Email) { Name = _Email; }
    User(string _Username = "", string _Password = "111111", string _Name = "", string _Address = "", string _Phone = "", string _Email = "")
    {
        Username = _Username;
        Password = _Password;
        Name = _Name;
        Address = _Address;
        Phone = _Phone;
        Email = _Email;
    }
    User(const User& u) {
        Username = u.Username;
        Password = u.Password;
        Name = u.Name;
        Address = u.Address;
        Phone = u.Phone;
        Email = u.Email;
    }
    ~User() {}
    virtual void ReadFile(ifstream& FileIn) {
        getline(FileIn, Username, ',');
        getline(FileIn, Password);
    }
    virtual void CreateFile(ofstream& FileOut, char*& FileName) {
        string str = (string)FileName;
        string strFile = "d:\\" + str + ".TXT";
        FileName = new char[strFile.length() + 1];
        strcpy(FileName, strFile.c_str());
        if (FileName != NULL)
        {
            FileOut.open(FileName, ios_base::out);
        }
        delete[] FileName;
    }
    virtual void OpenFile(ifstream& FileIn, char*& FileName) {
        string str = (string)FileName;
        string strFile = "d:\\" + str + ".TXT";
        FileName = new char[strFile.length() + 1];
        strcpy(FileName, strFile.c_str());
        if (FileName != NULL)
        {
            FileIn.open(FileName, ios_base::in);
        }
        delete[] FileName;
    }
    virtual void ReadInfomation(ifstream& FileIn) {
        getline(FileIn, Name);
        getline(FileIn, Address);
        getline(FileIn, Phone);
        getline(FileIn, Email);
    }
    virtual void DeleteFile(string FileName) {
        char c = 34;
        string Del = "del ";
        string FilePath1 = "d:\\";
        string FilePath2 = ".txt";
        string strDel = c + Del + FilePath1 + FileName + FilePath2 + c;
        char* ChuoiXoa = new char[strDel.length() + 1];
        strcpy(ChuoiXoa, strDel.c_str());
        system(ChuoiXoa);
    }
    virtual void Input() {
        cin.ignore();
        textcolor(3);
        cout << " Nhap thong tin ca nhan " << endl;
        cout << " Ho ten : ";
        textcolor(15);
        getline(cin, Name);
        textcolor(3);
        cout << " Dia chi: ";
        textcolor(15);
        getline(cin, Address);
        textcolor(3);
        cout << " So dien thoai: ";
        textcolor(15);
        getline(cin, Phone);
        textcolor(3);
        cout << " Dia chi Email: ";
        textcolor(15);
        getline(cin, Email);
    }
};

class Administrators : public User
{
public:
    void ReadFile(ifstream& FileIn) {
        User::ReadFile(FileIn);
    }
    void CreateFile(ofstream& FileOut, char* FileName) {
        User::CreateFile(FileOut, FileName);
    }
    bool operator ==(Administrators a) {
        return a.getUsername() + a.getPassword() == getUsername() + getPassword();
    }
    Administrators(string _Username = "", string _Password = "111111", string _Name = "", string _Address = "", string _Phone = "", string _Email = "")
        :User(_Username, _Password, _Name, _Address, _Phone, _Password) {}
};

class Employees : public User
{
public:
    void ReadFile(ifstream& FileIn) {
        User::ReadFile(FileIn);
    }
    void Input() {
        User::Input();
    }
    void CreateFile(ofstream& FileOut, char* FileName) {
        User::CreateFile(FileOut, FileName);
    }
    bool operator ==(Employees a) {
        return a.getUsername() + a.getPassword() == getUsername() + getPassword();
    }
    Employees(string _Username = "", string _Password = "111111", string _Name = "", string _Address = "", string _Phone = "", string _Email = "")
        :User(_Username, _Password, _Name, _Address, _Phone, _Password) {}
};

void DangNhapAdmin()
{
    textcolor(12);
    cout << "\t****************************" << endl;
    cout << "\t*    ";
    textcolor(14);
    cout << " DANG NHAP ADMIN      ";
    textcolor(12);
    cout << "*" << endl;
    cout << "\t****************************" << endl;
}
void DangNhapEmployees()
{
    textcolor(12);
    cout << "\t****************************" << endl;
    cout << "\t*   ";
    textcolor(14);
    cout << "DANG NHAP EMPLOYEE    ";
    textcolor(12);
    cout << "*" << endl;
    cout << "\t****************************" << endl;
}
void MenuAdmin()
{
    textcolor(12);
    cout << "\t************ MENU ADMIN ************" << endl;
    textcolor(14);
    cout << "\t    1. Them Employee                " << endl;
    cout << "\t    2. Xoa Employee                 " << endl;
    cout << "\t    3. Tim Employee                 " << endl;
    cout << "\t    4. Cap nhat Employee            " << endl;
    cout << "\t    5. Hien thi thong tin Employee  " << endl;
    cout << "\t    6. Thoat                        " << endl;
    textcolor(12);
    cout << "\t************************************" << endl;
}
void MenuEmployee()
{
    textcolor(12);
    cout << "\t*********** MENU EMPLOYEE *********" << endl;
    textcolor(14);
    cout << "\t     1. Xem thong tin tai khoan    " << endl;
    cout << "\t     2. Doi password               " << endl;
    cout << "\t     3. Thoat                      " << endl;
    textcolor(12);
    cout << "\t***********************************" << endl;

}
std::string passwordInput(unsigned maxLength)
{
    std::string pw;
    for (char c; (c = getch()); )
    {
        if (c == '\n' || c == '\r') { 
            std::cout << "\n";
            break;
        }
        else if (c == '\b') { 
            std::cout << "\b \b";
            if (!pw.empty()) pw.erase(pw.size() - 1);
        }
        else if (c == -32) { 
            _getch(); 
        }
        else if (isprint(c) && pw.size() < maxLength) { 
            std::cout << '*';
            pw += c;
        }
    }
    return pw;
}
void Login(string& TaiKhoan,string& MatKhau)
{
    textcolor(3);
    cout << "\tUser:     ";
    textcolor(15);
    cin >> TaiKhoan;
    char x = 'l';
    int size = 0;
    cout << endl;
    textcolor(3);
    cout << "\tPin:     ";
    MatKhau = passwordInput(15);
    cout << endl;
}
void Loginn(string& TaiKhoan, string& MatKhau)
{
    textcolor(3);
    cout << "\tUser:     ";
    textcolor(15);
    cin >> TaiKhoan;
    char x = 'l';
    int size = 0;
    cout << endl;
    textcolor(3);
    cout << "\tPass:     ";
    MatKhau = passwordInput(15);
    cout << endl;
}
bool KiemTraUsernameEmployee(User* x, string _User)
{
    ifstream FileIn;
    FileIn.open("d:\\Employees.txt", ios_base::in);
    while (!FileIn.eof())
    {
        x = new Employees();
        x->ReadFile(FileIn);
        if (_User == x->getUsername())
            return false;
    }
    FileIn.close();
    return true;
}
bool DangNhapThanhCong(User* x, char* FilePath, string& SaveUsername) {
    ifstream FileIn;
    FileIn.open(FilePath, ios_base::in);
    string TaiKhoan;
    string MatKhau;
    Login(TaiKhoan, MatKhau);
    while (!FileIn.eof())
    {
        x = new User();
        x->ReadFile(FileIn);
        if (x->getUsername() + x->getPassword() == TaiKhoan + " " + MatKhau) {
            SaveUsername = TaiKhoan;
            return true;
        }
    }
    FileIn.close();
    return false;
}
bool DangNhapThanhCongg(User* x, char* FilePath, string& SaveUsername) {
    ifstream FileIn;
    FileIn.open(FilePath, ios_base::in);
    string TaiKhoan;
    string MatKhau;
    Loginn(TaiKhoan, MatKhau);
    while (!FileIn.eof())
    {
        x = new User();
        x->ReadFile(FileIn);
        if (x->getUsername() + x->getPassword() == TaiKhoan + " " + MatKhau) {
            SaveUsername = MatKhau;
            return true;
        }
    }
    FileIn.close();
    return false;
}
void ThemEmployee(User* x)
{
    string _User, _Pass;
    textcolor(3);
    cout << " Nhap Username muon them: ";
    textcolor(15);
    cin >> _User;
    if (KiemTraUsernameEmployee(x, _User) == true)
    {
        char* FilePath = new char[_User.length() + 1];
        strcpy(FilePath, _User.c_str());

        ofstream FileOut;
        Employees* Emp = new Employees();
        FileOut.open("d:\\Employees.TXT", ios_base::app);
        FileOut << endl << _User << ", " << "111111";
        FileOut.close();

        Emp->CreateFile(FileOut, FilePath);
        Emp->Input();
        FileOut << Emp->getName() << endl << Emp->getAddress() << endl << Emp->getPhone() << endl << Emp->getEmail();
        FileOut.close();
        textcolor(10);
        cout << " Them thanh cong !" << endl;
    }
    else
    {
        textcolor(12);
        cout << " Username da ton tai !" << "\n";
    }
}
void XoaEmployee(User* x, string s) {
    ifstream FileIn;
    FileIn.open("d:\\Employees.txt", ios_base::in);
    ofstream FileOut;
    FileOut.open("d:\\EmployeesCopy.txt", ios_base::out);
    int count = 0;
    while (!FileIn.eof())
    {
        x = new Employees();
        x->ReadFile(FileIn);
        if (x->getUsername() != s)
        {
            FileOut << x->getUsername() << "," << x->getPassword() << endl;
        }
        count++;
    }
    FileIn.close();
    FileOut.close();
    system("del d:\\Employees.txt");
    char* c = (char*)"Employees";
    x->CreateFile(FileOut, c);
    FileOut.close();
    FileIn.open("d:\\EmployeesCopy.txt", ios_base::in);
    FileOut.open("d:\\Employees.txt", ios_base::out);
    while (count > 1) {
        x = new Employees();
        x->ReadFile(FileIn);
        if (count == 2)
        {
            FileOut << x->getUsername() << "," << x->getPassword();
            break;
        }
        FileOut << x->getUsername() << "," << x->getPassword() << endl;
        count--;
    }
    FileIn.close();
    FileOut.close();
    x->DeleteFile(s);
    textcolor(10);
    cout << " Xoa thanh cong !" << endl;
    system("del d:\\EmployeesCopy.txt");
}
void TimEmployee(User* x, string Username)
{
    ifstream FileIn;
    char* FileName = new char[Username.length() + 1];
    strcpy(FileName, Username.c_str());
    x = new Employees();
    x->OpenFile(FileIn, FileName);
    x->ReadInfomation(FileIn);
    textcolor(12);
    cout << " Thong tin Employee can tim: " << endl;
    textcolor(11);
    cout << " Ho ten: " << x->getName() << endl;
    cout << " Dia chi: " << x->getAddress() << endl;
    cout << " So dien thoai: " << x->getPhone() << endl;
    cout << " Dia chi Email: " << x->getEmail() << endl;
    FileIn.close();
}
void TimEmployeee(User* x, string Username)
{
    ifstream FileIn;
    char* FileName = new char[Username.length() + 1];
    strcpy(FileName, Username.c_str());
    x = new Employees();
    x->OpenFile(FileIn, FileName);
    x->ReadInfomation(FileIn);
    textcolor(11);
    cout << " Ho ten: " << x->getName() << endl;
    cout << " Dia chi: " << x->getAddress() << endl;
    cout << " So dien thoai: " << x->getPhone() << endl;
    cout << " Dia chi Email: " << x->getEmail() << endl;
    getch();
    FileIn.close();
}
void XemThongTinTaiKhoan(User* x, string Username)
{
    ifstream FileIn;
    char* FileName = new char[Username.length() + 1];
    strcpy(FileName, Username.c_str());
    x = new Employees();
    x->OpenFile(FileIn, FileName);
    x->ReadInfomation(FileIn);
    textcolor(11);
    cout << " Thong tin tai khoan" << endl;
    cout << " Ho ten: " << x->getName() << endl;
    cout << " Dia chi: " << x->getAddress() << endl;
    cout << " So dien thoai: " << x->getPhone() << endl;
    cout << " Dia chi Email: " << x->getEmail();
    FileIn.close();
}
void CapNhatEmployee(User* x)
{
    ifstream FileIn;
    ofstream FileOut;
    FileIn.open("d:\\Employees.txt", ios_base::in);
    textcolor(3);
    cout << " Nhap Username muon cap nhat: ";
    string strUser;
    textcolor(15);
    cin >> strUser;
    bool KT = false;
    while (!FileIn.eof())
    {
        x = new User();
        x->ReadFile(FileIn);
        if (x->getUsername() == strUser) {
            KT = true;
            break;
        }
    }
    FileIn.close();
    if (KT == true)
    {
        textcolor(10);
        cout << " Chon muc ban muon cap nhat: " << endl;
        cout << " 1. Ho ten " << endl;
        cout << " 2. Dia chi " << endl;
        cout << " 3. So dien thoai " << endl;
        cout << " 4. Email " << endl;
        int LuaChon;
        textcolor(15);
        cin >> LuaChon;
        char* FileName = new char[strUser.length() + 1];
        strcpy(FileName, strUser.c_str());
        x = new Employees();
        string Edit;
        if (LuaChon == 1)
        {
            textcolor(3);
            cout << " Nhap ho ten thay doi: ";
            cin.ignore();
            textcolor(15);
            getline(cin, Edit);
            x->OpenFile(FileIn, FileName);
            x->ReadInfomation(FileIn);
            FileOut.open("d:\\NoName.txt", ios_base::out);
            FileOut << Edit << endl << x->getAddress() << endl << x->getPhone() << endl << x->getEmail();
            FileIn.close();
            FileOut.close();
            x->DeleteFile(strUser);

            char* fileName = new char[strUser.length() + 1];
            strcpy(fileName, strUser.c_str());
            FileIn.open("d:\\NoName.txt", ios_base::in);
            x = new Employees();
            x->ReadInfomation(FileIn);
            x->CreateFile(FileOut, fileName);
            FileOut << x->getName() << endl << x->getAddress() << endl << x->getPhone() << endl << x->getEmail();
            FileIn.close();
            FileOut.close();
            textcolor(10);
            cout << " Cap nhat ho ten Employee thanh cong !" << endl;
            x->DeleteFile("NoName");
        }
        else if (LuaChon == 2)
        {
            textcolor(13);
            cout << " Nhap dia chi thay doi: ";
            cin.ignore();
            textcolor(15);
            getline(cin, Edit);
            x->OpenFile(FileIn, FileName);
            x->ReadInfomation(FileIn);
            FileOut.open("d:\\NoName.txt", ios_base::out);
            FileOut << x->getName() << endl << Edit << endl << x->getPhone() << endl << x->getEmail();
            FileIn.close();
            FileOut.close();
            x->DeleteFile(strUser);

            char* fileName = new char[strUser.length() + 1];
            strcpy(fileName, strUser.c_str());
            FileIn.open("d:\\NoName.txt", ios_base::in);
            x = new Employees();
            x->ReadInfomation(FileIn);
            x->CreateFile(FileOut, fileName);
            FileOut << x->getName() << endl << x->getAddress() << endl << x->getPhone() << endl << x->getEmail();
            FileIn.close();
            FileOut.close();
            textcolor(10);
            cout << " Cap nhat dia chi Employee thanh cong !" << endl;
            x->DeleteFile("NoName");
        }
        else if (LuaChon == 3)
        {
            textcolor(3);
            cout << " Nhap so dien thoai thay doi: ";
            cin.ignore();
            textcolor(15);
            getline(cin, Edit);
            x->OpenFile(FileIn, FileName);
            x->ReadInfomation(FileIn);
            FileOut.open("d:\\NoName.txt", ios_base::out);
            FileOut << x->getName() << endl << x->getAddress() << endl << Edit << endl << x->getEmail();
            FileIn.close();
            FileOut.close();
            x->DeleteFile(strUser);

            char* fileName = new char[strUser.length() + 1];
            strcpy(fileName, strUser.c_str());
            FileIn.open("d:\\NoName.txt", ios_base::in);
            x = new Employees();
            x->ReadInfomation(FileIn);
            x->CreateFile(FileOut, fileName);
            FileOut << x->getName() << endl << x->getAddress() << endl << x->getPhone() << endl << x->getEmail();
            FileIn.close();
            FileOut.close();
            textcolor(10);
            cout << " Cap nhat so dien thoai Employee thanh cong !" << endl;
            x->DeleteFile("NoName");
        }
        else if (LuaChon == 4)
        {
            textcolor(3);
            cout << " Nhap email thay doi: ";
            cin.ignore();
            textcolor(15);
            getline(cin, Edit);
            x->OpenFile(FileIn, FileName);
            x->ReadInfomation(FileIn);
            FileOut.open("d:\\NoName.txt", ios_base::out);
            FileOut << x->getName() << endl << x->getAddress() << endl << x->getPhone() << endl << Edit;
            FileIn.close();
            FileOut.close();
            x->DeleteFile(strUser);

            char* fileName = new char[strUser.length() + 1];
            strcpy(fileName, strUser.c_str());
            FileIn.open("d:\\NoName.txt", ios_base::in);
            x = new Employees();
            x->ReadInfomation(FileIn);
            x->CreateFile(FileOut, fileName);
            FileOut << x->getName() << endl << x->getAddress() << endl << x->getPhone() << endl << x->getEmail();
            FileIn.close();
            FileOut.close();
            textcolor(10);
            cout << " Cap nhat email Employee thanh cong !" << endl;
            x->DeleteFile("NoName");
        }
    }
    else
    {
        textcolor(12);
        cout << " Username khong ton tai! " << endl;
    }
}
void HienThiThongTinEmployee(User* x)
{
    ifstream FileIn;
    x = new Employees();
    FileIn.open("d:\\Employees.txt", ios_base::in);
    string strUser[100];
    int n = 0;
    while (!FileIn.eof())
    {
        x->ReadFile(FileIn);
        strUser[n] = x->getUsername();
        n++;
    }
    FileIn.close();
    for (int i = 0; i < n; i++) {
        textcolor(12);
        cout << " Thong tin " << strUser[i] << ": " << endl;
        string s = strUser[i];
        char* FileName = new char[s.length() + 1];
        strcpy(FileName, s.c_str());
        x->OpenFile(FileIn, FileName);
        x->ReadInfomation(FileIn);
        textcolor(11);
        cout << " Ho ten: " << x->getName() << endl;
        cout << " Dia chi: " << x->getAddress() << endl;
        cout << " So dien thoai: " << x->getPhone() << endl;
        cout << " Dia chi Email: " << x->getEmail() << endl;
        cout << endl;
        FileIn.close();
    }
}
void ThucHienDoiMatKhau(User* x, string CurrentPass, string NewPass, string SaveUsername)
{
    ifstream FileIn;
    ofstream FileOut;
    string s = "NoName";
    char* fileName = new char[s.length() + 1];
    strcpy(fileName, s.c_str());
    x->CreateFile(FileOut, fileName);
    FileIn.open("d:\\Employees.txt", ios_base::in);
    int count = 0;
    while (!FileIn.eof())
    {
        x->ReadFile(FileIn);
        count++;
    }
    FileIn.close();
    int tmp = count;
    FileIn.open("d:\\Employees.txt", ios_base::in);
    while (count > 0)
    {
        x->ReadFile(FileIn);
        if (count == 1)
        {
            FileOut << x->getUsername() << "," << x->getPassword();
            break;
        }
        FileOut << x->getUsername() << "," << x->getPassword() << endl;
        count--;
    }
    FileIn.close();
    FileOut.close();
    x->DeleteFile("Employees");
    string s2 = "NoName";
    char* fileName2 = new char[s2.length() + 1];
    strcpy(fileName2, s2.c_str());
    x->OpenFile(FileIn, fileName2);
    FileOut.open("d:\\Employees.txt", ios_base::out);
    while (tmp > 0)
    {
        x->ReadFile(FileIn);
        if (SaveUsername == x->getUsername() && " " + CurrentPass == x->getPassword() && tmp == 1)
        {
            FileOut << x->getUsername() << ", " << NewPass;
            break;
        }
        else if (SaveUsername == x->getUsername() && " " + CurrentPass == x->getPassword())
        {
            FileOut << x->getUsername() << ", " << NewPass << endl;
        }
        else
        {
            if (tmp == 1)
            {
                FileOut << x->getUsername() << "," << x->getPassword();
                break;
            }
            else if (tmp != 1)
            {
                FileOut << x->getUsername() << "," << x->getPassword() << endl;
            }
            else
            {
                break;
            }
        }
        tmp--;
    }
    textcolor(10);
    cout << "\n Doi mat khau thanh cong !";
    FileIn.close();
    FileOut.close();
    x->DeleteFile("NoName");
}
void DoiMatKhau(User* x)
{
    ifstream FileIn;
    ofstream FileOut;
    int size = 0;
    string _User;
    textcolor(14);
    cout << "             KHONG SU DUNG MAT KHAU MAC DINH : 111111 ";
    textcolor(3);
    cout << "\n Nhap username hien tai: ";
    textcolor(15);
    cin >> _User;
    textcolor(3);
    cout << " Nhap password hien tai: ";
    textcolor(15);
    std::string CurrentPass = passwordInput(10);
    textcolor(3);
    cout << " Nhap password moi: ";
    textcolor(15);
   
    std::string NewPass = passwordInput(10);
    textcolor(3);
    cout << " Nhap lai password moi: ";
    textcolor(15);
    std::string ConfirmPass = passwordInput(10);
    FileIn.open("d:\\Employees.txt", ios_base::in);
    bool XacNhan = false;
    while (!FileIn.eof())
    {
        x = new Employees();
        x->ReadFile(FileIn);
        if (" " + (string)CurrentPass == x->getPassword() && (string)NewPass == (string)ConfirmPass && (string)NewPass!="111111")
        {
            XacNhan = true;
            break;
        }
       
    }
    FileIn.close();
    if (XacNhan == false)
    {
        textcolor(12);
        cout << "\n Thong tin ban nhap khong chinh xac, ban vui long kiem tra lai !" << endl;
        getch();
        system("cls");
        DoiMatKhau(x);
       
    } 
    else
    {
        ThucHienDoiMatKhau(x, CurrentPass, NewPass, _User);
    }
}
void DoiMatKhauu(User* x)
{
    ifstream FileIn;
    ofstream FileOut;
    int size = 0;
    string _User;
    textcolor(14);
    cout << "             KHONG SU DUNG MAT KHAU MAC DINH : 111111 ";
    textcolor(3);
    cout << "\n Nhap username hien tai: ";
    textcolor(15);
    cin >> _User;
    textcolor(3);
    cout << " Nhap password hien tai: ";
    textcolor(15);
    std::string CurrentPass = passwordInput(10);
    textcolor(3);
    cout << " Nhap password moi: ";
    textcolor(15);

    std::string NewPass = passwordInput(10);
    textcolor(3);
    cout << " Nhap lai password moi: ";
    textcolor(15);
    std::string ConfirmPass = passwordInput(10);
    FileIn.open("d:\\Employees.txt", ios_base::in);
    bool XacNhan = false;
    while (!FileIn.eof())
    {
        x = new Employees();
        x->ReadFile(FileIn);
        if (" " + (string)CurrentPass == x->getPassword() && (string)NewPass == (string)ConfirmPass && (string)NewPass != "111111")
        {
            XacNhan = true;
            break;
        }

    }
    FileIn.close();
    if (XacNhan == false)
    {
        textcolor(12);
        cout << "\n Thong tin ban nhap khong chinh xac, ban vui long kiem tra lai !" << endl;
    }
    else
    {
        ThucHienDoiMatKhau(x, CurrentPass, NewPass, _User);
    }
}
void Menu(User* ds[])
{
    while (true)
    {
        system("cls");
        textcolor(12);
        cout << "          **********************************" << endl;
        textcolor(14);
        cout << "               1. Dang Nhap ADMIN" << endl;
        cout << "               2. Dang Nhap EMPLOYEE" << endl;
        textcolor(12);
        cout << "          **********************************" << endl;
        textcolor(9);
        cout << "               Nhap lua chon: ";
        int LuaChon;
        textcolor(15);
        cin >> LuaChon;
        string TaiKhoan;
        string MatKhau;
        int k;
        string SaveUsername;
        if (LuaChon == 1)
        {
            int n = 0;
            bool Exit = false;
            while (true)
            {
                system("cls");
                DangNhapAdmin();
                ifstream FileIn;
                ofstream FileOut;
                User* x = NULL;
                if (DangNhapThanhCong(x, (char*)"d:\\Admin.txt", SaveUsername))
                {
                    while (true)
                    {
                        system("cls");
                        MenuAdmin();
                        textcolor(3);
                        cout << " Moi ban chon chuc nang: ";
                        textcolor(15);
                        cin >> k;
                        if (k == 1)
                        {
                            ThemEmployee(x);
                            string s;
                            getch();
                        }
                        else if (k == 2)
                        {
                            string _User;
                            textcolor(3);
                            cout << " Nhap Username muon xoa: ";
                            textcolor(15);
                            cin >> _User;
                            FileIn.open("d:\\Employees.txt", ios_base::in);
                            bool TimThay = false;
                            while (!FileIn.eof())
                            {
                                x = new Employees();
                                x->ReadFile(FileIn);
                                if (x->getUsername() == _User)
                                {
                                    TimThay = true;
                                    break;
                                }
                            }
                            FileIn.close();
                            if (TimThay == false)
                            {
                                textcolor(12);
                                cout << " Khong tim thay " << _User << " de xoa!" << endl;
                                getch();
                            }
                            else
                            {
                                XoaEmployee(x, _User);
                                getch();
                            }
                            FileOut.close();
                        }
                        else if (k == 3)
                        {
                            string _User;
                            textcolor(3);
                            cout << " Nhap Username muon tim: ";
                            textcolor(15);
                            cin >> _User;
                            FileIn.open("d:\\Employees.txt", ios_base::in);
                            bool TimThay = false;
                            while (!FileIn.eof())
                            {
                                x = new Employees();
                                x->ReadFile(FileIn);
                                if (x->getUsername() == _User)
                                {
                                    TimThay = true;
                                    break;
                                }
                            }
                            FileIn.close();
                            if (TimThay == false)
                            {
                                textcolor(12);
                                cout << " Khong tim thay Employee!" << endl;
                                getch();
                            }
                            else
                            {
                                TimEmployee(x, _User);
                                getch();
                            }
                        }
                        else if (k == 4)
                        {
                            CapNhatEmployee(x);
                            getch();
                        }
                        else if (k == 5)
                        {
                            HienThiThongTinEmployee(x);
                            getch();
                        }
                        else if (k == 6)
                        {
                            Exit = true;
                            break;
                        }
                        else
                        {
                            textcolor(12);
                            cout << " Lua chon khong hop le!" << endl;
                            getch();
                        }
                    }
                    if (Exit == true) break;
                }
                else
                {
                    n++;
                    textcolor(12);
                    cout << " Sai tai khoan hoac mat khau!" << endl;
                }
                if (n == 3)
                {
                    cout << "   ban da nhap sai 3 lan !";
                    getch();
                    Menu(ds);

                }
                if (Exit == true) break;
                getch();
            }
        }
        else if (LuaChon == 2)
        {
            int count = 0;
            bool Exit = false;
            while (true)
            {
                system("cls");
                DangNhapEmployees();
                ifstream FileIn;
                User* x = NULL;
                int n = 0;
                if (DangNhapThanhCongg(x, (char*)"d:\\Employees.txt" , SaveUsername))
                {
                    textcolor(10);
                    cout << " Dang nhap thanh cong !" << endl;
                    getch();
                    if (SaveUsername == "111111")
                    {
                        textcolor(3);
                        cout << " Ban vui long doi mat khau truoc khi su dung chuong trinh!" << endl;
                        getch();
                        system("cls");
                        DoiMatKhau(x);
                        getch();
                    }
                    while (true)
                    {
                        system("cls");
                        MenuEmployee();
                        textcolor(3);
                        cout << " Moi ban chon chuc nang: ";
                        textcolor(15);
                        cin >> k;
                        if (k == 1)
                        {
                            string _User;
                            textcolor(3);
                            cout << " Nhap lai Username cua ban: ";
                            textcolor(15);
                            cin >> _User;
                            FileIn.open("d:\\Employees.txt", ios_base::in);
                            while (!FileIn.eof())
                            {
                                x = new Employees();
                                x->ReadFile(FileIn);
                                if (x->getUsername() == _User)
                                {
                                    break;
                                }
                            }
                            FileIn.close();
                            TimEmployeee(x, _User);
                        }
                        else if (k == 2)
                        {
                            DoiMatKhauu(x);
                            getch();
                        }
                        else if (k == 3)
                        {
                            Exit = true;
                            break;
                        }
                        else
                        {
                            textcolor(12);
                            cout << " Lua chon khong hop le!" << endl;
                            getch();
                        }
                    }
                }
                else
                {
                    count++;
                    textcolor(12);
                    cout << " Sai tai khoan hoac mat khau!" << endl;
                }
                if (count == 3)
                {
                    cout << "   ban da nhap sai 3 lan !";
                    getch();
                    Menu(ds);

                }
                if (Exit == true) break;
                getch();
            }
        }
    }
}
int main() {
    User* ds[100];
    Menu(ds);
    system("pause");
}

import javax.swing.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

abstract class Nguoi {
    protected String hoTen;
    protected String diaChi;
    protected String loaiSinhVien;
    protected double diemTB;

    public abstract void nhapThongTin();
    public abstract void tinhDiem();
    public void inThongTin() {
        JOptionPane.showMessageDialog(null,
                "* Họ tên: " + hoTen + "\n" +
                        "* Địa chỉ: " + diaChi + "\n" +
                        "* Ngày sinh: " + "Ngày sinh ở đây" + "\n" +
                        "* Loại Sinh viên: " + loaiSinhVien + "\n" +
                        "* Điểm trung bình: " + diemTB);
    }
}

class SVCaoDangNghe extends Nguoi {
    private double tongDiemKT;
    private int soMonKT;

    @Override
    public void nhapThongTin() {
        hoTen = JOptionPane.showInputDialog("Nhập Họ tên:");
        diaChi = JOptionPane.showInputDialog("Nhập Địa chỉ:");
        loaiSinhVien = "SVCĐN";
        tongDiemKT = Double.parseDouble(JOptionPane.showInputDialog("Nhập Tổng điểm kiểm tra:"));
        soMonKT = Integer.parseInt(JOptionPane.showInputDialog("Nhập Số môn kiểm tra:"));
    }

    @Override
    public void tinhDiem() {
        if (soMonKT > 0) {
            diemTB = tongDiemKT / soMonKT;
        } else {
            JOptionPane.showMessageDialog(null, "Số môn kiểm tra phải lớn hơn 0.");
        }
    }
}

class SVCaoDangChinhQuy extends Nguoi {
    private double tongDiemKT;
    private int soMonKT;
    private double diemKTHP;

    @Override
    public void nhapThongTin() {
        hoTen = JOptionPane.showInputDialog("Nhập Họ tên:");
        diaChi = JOptionPane.showInputDialog("Nhập Địa chỉ:");
        loaiSinhVien = "SVCĐCQ";
        tongDiemKT = Double.parseDouble(JOptionPane.showInputDialog("Nhập Tổng điểm kiểm tra:"));
        soMonKT = Integer.parseInt(JOptionPane.showInputDialog("Nhập Số môn kiểm tra:"));
        diemKTHP = Double.parseDouble(JOptionPane.showInputDialog("Nhập Điểm thi kết thúc học phần:"));
    }

    @Override
    public void tinhDiem() {
        if (soMonKT > 0) {
            diemTB = (tongDiemKT / soMonKT + diemKTHP) / 3;
        } else {
            JOptionPane.showMessageDialog(null, "Số môn kiểm tra phải lớn hơn 0.");
        }
    }
}

public class bai12 {
    public static void main(String[] args) {
        Nguoi sv1 = new SVCaoDangNghe();
        Nguoi sv2 = new SVCaoDangChinhQuy();

        sv1.nhapThongTin();
        sv1.tinhDiem();
        sv2.nhapThongTin();
        sv2.tinhDiem();

        JOptionPane.showMessageDialog(null, "Thông tin sinh viên cao đẳng nghề:");
        sv1.inThongTin();

        JOptionPane.showMessageDialog(null, "Thông tin sinh viên cao đẳng chính quy:");
        sv2.inThongTin();
    }
}
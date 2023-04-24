using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Globalization;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.MySqlClient;

namespace WindowsFormsApp1
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        static string conexion = "server=localhost;port=3306;database=bdjenny2;uid=root;pwd=;Convert Zero Datetime=true;";
        MySqlConnection cn = new MySqlConnection(conexion);

        private void Form1_Load(object sender, EventArgs e)
        {
            dataGridView1.DataSource = llenar_grid();
        }

        public DataTable llenar_grid()
        {
            DataTable dt = new DataTable();
            try
            {
                cn.Open();
                string llenar = "SELECT *FROM persona";
                MySqlCommand cmd = new MySqlCommand(llenar, cn);
                MySqlDataAdapter da = new MySqlDataAdapter(cmd);
                da.Fill(dt);
            }
            catch (Exception ex)
            {
                MessageBox.Show("Error: " + ex.Message);
            }
            finally
            {
                cn.Close();
            }
            return dt;
        }
        //agregar
        private void button1_Click(object sender, EventArgs e)
        {
            try
            {
                cn.Open();
                string insertar = "INSERT INTO persona(ci,NombreCompleto,FechaNacimiento,Telefono,codigo_deptos) VALUE(@ci,@NombreCompleto,@FechaNacimiento,@Telefono,@codigo_deptos)";
                MySqlCommand cmd = new MySqlCommand(insertar, cn);
                cmd.Parameters.AddWithValue("@ci", tci.Text);
                cmd.Parameters.AddWithValue("@NombreCompleto", tnombre.Text);
                cmd.Parameters.AddWithValue("@FechaNacimiento", tfecha);
                cmd.Parameters.AddWithValue("@Telefono", tfono.Text);
                cmd.Parameters.AddWithValue("@codigo_deptos", tcodigo.Text);
                cmd.ExecuteNonQuery();
                MessageBox.Show("Se registro con éxito");
                dataGridView1.DataSource = llenar_grid();
            }
            catch (Exception ex)
            {
                MessageBox.Show("Error: " + ex.Message);
            }
            finally
            {
                cn.Close();
            }
        }
        //modificar
        private void button2_Click(object sender, EventArgs e)
        {
            cn.Open();
            string actualizar = "UPDATE persona SET ci=@tci, NombreCompleto=@NombreCompleto,FechaNacimiento=@FechaNacimiento,Telefono=@Telefono,codigo_deptos0@codigo_deptos WHERE ci=@ci";
            MySqlCommand cmd = new MySqlCommand(actualizar, cn);
            cmd.Parameters.AddWithValue("@ci", tci.Text);
            cmd.Parameters.AddWithValue("@NombreCompleto", tnombre.Text);
            cmd.Parameters.AddWithValue("@FechaNacimiento", tfecha);
            cmd.Parameters.AddWithValue("@Telefono", tfono.Text);
            cmd.Parameters.AddWithValue("@codigo_deptos", tcodigo.Text);
            cmd.ExecuteNonQuery();
            MessageBox.Show("Datos modificados con exito");
            dataGridView1.DataSource = llenar_grid();

        }
        //mostrar datos en los texbox
        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {
            try
            {
                tci.Text = dataGridView1.CurrentRow.Cells[0].Value.ToString();
                tnombre.Text = dataGridView1.CurrentRow.Cells[1].Value.ToString();
                tfecha.Text = dataGridView1.CurrentRow.Cells[2].Value.ToString();
                tfono.Text = dataGridView1.CurrentRow.Cells[3].Value.ToString();
                tcodigo.Text = dataGridView1.CurrentRow.Cells[4].Value.ToString();
            }
            catch
            {

            }

        }
        //eliminar
        private void button3_Click(object sender, EventArgs e)
        {
            cn.Open();

            string eliminar = "DELETE FROM persona WHERE ci=@ci";
            MySqlCommand cmd = new MySqlCommand(eliminar, cn);
            cmd.Parameters.AddWithValue("@ci", tci.Text);
            cmd.ExecuteNonQuery();
            cn.Close();

            MessageBox.Show("Datos eliminados con exito");
            dataGridView1.DataSource = llenar_grid();

        }
        //limpiar
        private void button4_Click(object sender, EventArgs e)
        {
            tci.Clear();
            tnombre.Clear();
            tfecha.Clear();
            tfono.Clear();
            tcodigo.Clear();

        }
    }
}

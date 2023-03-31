using System;
using System.Collections.Generic;
using System.Data;
using System.Data.SqlClient;
using System.Windows.Forms;

namespace Library
{
    public partial class Reference : Form
    {
        private readonly string ConnectionString = "Data Source=(LocalDB)\\MSSQLLocalDB;AttachDbFilename=C:\\Users\\chavd\\Documents\\Projects\\VSProjects\\Library\\Library\\LibraryDB.mdf;Integrated Security=True";
        private SqlConnection Connection;
        private SqlCommand Command;

        private readonly List<string> Genres = new List<string>()
        {
            "Fiction",
            "Non-Fiction",
            "Fantasy",
            "Science Fiction",
            "Romance",
            "Mystery",
            "Horror",
            "Thriller"
        };

        public Reference()
        {
            InitializeComponent();
        }

        private void Reference_Load(object sender, EventArgs e)
        {
            comboBox1.DataSource = Genres;
        }

        private void button1_Click(object sender, EventArgs e)
        {
            FillDataGridView("SELECT * FROM Visitors");
        }

        private void button2_Click(object sender, EventArgs e)
        {
            FillDataGridView("SELECT * FROM Books WHERE Genre = @genre AND Author = @author AND ReleaseYear = @releaseyear",
                new SqlParameter("@genre", comboBox1.Text),
                new SqlParameter("@author", textBox1.Text),
                new SqlParameter("@releaseyear", textBox2.Text));
        }

        private void button3_Click(object sender, EventArgs e)
        {
            int[] ageDistribution = new int[5];
            using (Connection = new SqlConnection(ConnectionString))
            {
                Connection.Open();
                Command = new SqlCommand("SELECT * FROM Visitors", Connection);
                var reader = Command.ExecuteReader();
                while (reader.Read())
                {
                    int age = DateTime.Now.Year - (1900 + int.Parse(reader["EGN"].ToString().Substring(0, 2)));
                    if (age < 10) ageDistribution[0]++;
                    else if (age < 18) ageDistribution[1]++;
                    else if (age < 30) ageDistribution[2]++;
                    else if (age < 65) ageDistribution[3]++;
                    else ageDistribution[4]++;
                }
            }
            MessageBox.Show("Age distribution: \n0-10: " + ageDistribution[0] + "\n11-18: " + ageDistribution[1] + "\n19-30: " + ageDistribution[2] + "\n31-65: " + ageDistribution[3] + "\n65+: " + ageDistribution[4]);
        }

        private void FillDataGridView(string sql, params SqlParameter[] parameters)
        {
            using (Connection = new SqlConnection(ConnectionString))
            {
                Connection.Open();
                Command = new SqlCommand(sql, Connection);
                Command.Parameters.AddRange(parameters);
                SqlDataAdapter adapter = new SqlDataAdapter(Command);
                DataTable table = new DataTable();
                adapter.Fill(table);
                dataGridView1.DataSource = table;
            }
        }
    }
}

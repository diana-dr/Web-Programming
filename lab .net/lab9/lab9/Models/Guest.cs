using System;
using lab9.DTO;
using System.IO;
using System.Linq;

namespace lab9.Models
{

    public class Guest
    {
        public int Id { get; set; }
        public string Title { get; set; }
        public string Comment { get; set; }
        public DateTime Date { get; set; }
        public long AuthorId { get; set; }
        public User Author { get; set; }

        public Guest() {}

        private static string RandomString(int length)
        {
            Random random = new Random();
            const string chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            return new string(Enumerable.Repeat(chars, length)
              .Select(s => s[random.Next(s.Length)]).ToArray());
        }

        public Guest(GuestInputDTO guestDTO)
        {
            this.Title = guestDTO.Title;
            this.Comment = guestDTO.Comment;
            this.Date = DateTime.Now;
        }
    }
}

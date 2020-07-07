using Microsoft.EntityFrameworkCore;
using System;
using lab9.Models;

namespace lab9.Models
{
    public class ModelContext : DbContext
    {
        public DbSet<User> Users { get; set; }
        public DbSet<Guest> Guests { get; set; }

        protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
        {
            optionsBuilder.UseMySQL("server=localhost;database=guestbook;user=root;password=MySQL9d9d");
        }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            base.OnModelCreating(modelBuilder);

            modelBuilder.Entity<User>(entity =>
            {
                entity.HasKey(e => e.Id);
                entity.Property(e => e.Username).IsRequired();
                entity.Property(e => e.Password).IsRequired();
            });

            modelBuilder.Entity<Guest>(entity =>
            {
                entity.HasKey(e => e.Id);
                entity.Property(e => e.Title).IsRequired();
                entity.Property(e => e.Comment).IsRequired();
                entity.Property(e => e.Date).IsRequired();
                entity.HasOne(e => e.Author).WithMany(e => e.Guests).HasForeignKey(e => e.AuthorId);
            });
        }

        public DbSet<lab9.Models.Guest> Guest { get; set; }
    }
}
